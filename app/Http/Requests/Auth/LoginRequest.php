<?php

namespace App\Http\Requests\Auth;

use App\Models\User;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http; // <-- Jangan lupa import HTTP
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nim' => ['required', 'string'],
            'password' => ['required', 'string'],
        ];
    }

    public function authenticate(): void
    {
        $this->ensureIsNotRateLimited();

        $nim = $this->input('nim');
        $password = $this->input('password');

        // 1. Tembak API Login Kampus
        $loginResponse = Http::withHeaders([
            'college-id' => '041105',
        ])->post('https://mahasiswa.lms.uym.ac.id/v2/access_token', [
            'username' => $nim,
            'password' => $password,
            'client_id' => 'web',
            'grant_type' => 'password',
        ]);

        // Kalau gagal login dari API
        if (!$loginResponse->successful() || !$loginResponse->json('access_token')) {
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'nim' => 'NIM atau password salah .',
            ]);
        }

        $token = $loginResponse->json('access_token');

        // 2. Tembak API Profil Mahasiswa
        $profileResponse = Http::withToken($token)
            ->withHeaders(['college-id' => '041105'])
            ->get("https://mahasiswa.lms.uym.ac.id/v1/mahasiswa/{$nim}");

        if (!$profileResponse->successful()) {
            RateLimiter::hit($this->throttleKey());
            throw ValidationException::withMessages([
                'nim' => 'Gagal mengambil data profil .',
            ]);
        }

        $profileData = $profileResponse->json();

        // 3. Auto-Register / Sync ke Database Lokal & Login
        // Cek nama property dari response JSON API kampus lu, misal namanya 'nama_mahasiswa'
        $nama = $profileData['nama'] ?? $nim;

        $user = User::updateOrCreate(
            ['nim' => $nim], // Cari berdasarkan NIM sebagai penanda unik
            [
                'nama'          => $profileData['nama'] ?? 'Tanpa Nama',
                'username'      => $nim, // Samain dengan NIM untuk field username di DB lu
                'password'      => bcrypt(Str::random(16)), // Diacak karena auth utama pakai API kampus
                'email'         => $profileData['email'] ?? null,
                'role'          => 'user', // Default role
                'agama'         => $profileData['namaAgama'] ?? null, // Mengambil "Islam"
                'jenis_kelamin' => $profileData['namaGender'] ?? null, // Mengambil "Laki-laki"
                'Angkatan'      => $profileData['angkatan'] ?? null, // Mengambil 2023

                // Karena 'kelas' & 'prodi' di API berbentuk array, kita ambil field nama di dalamnya
                'Kelas'         => $profileData['kelas']['nama'] ?? null,
                'program_studi' => $profileData['prodi']['nama'] ?? null,

                'Status'        => $profileData['namaStatus'] ?? null, // Mengambil "Aktif"
            ]
        );

        // 4. Jalankan login bawaan Laravel
        Auth::login($user, $this->boolean('remember'));

        RateLimiter::clear($this->throttleKey());
    }

    /**
     * Ensure the login request is not rate limited.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'nim' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the rate limiting throttle key for the request.
     */
    public function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->string('nim')) . '|' . $this->ip());
    }
}
