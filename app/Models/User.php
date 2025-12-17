<?php

namespace App\Models;

use App\UserRole;
use Filament\Models\Contracts\HasName;
use Filament\Models\Contracts\FilamentUser; // (Opsional: Kalau lo pake proteksi admin)
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements HasName
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'nama',
        'nim',
        'username',
        'email',
        'password',
        'role',
        'agama',
        'jenis_kelamin',
        'Angkatan',
        'Kelas',
        'Status',
        'program_studi',
    ];

    protected $guarded = ['id']; // Biar semua kolom bisa diisi kecuali ID

    protected $casts = [
        'password' => 'hashed',
        'role' => UserRole::class, // Auto convert ke Enum
    ];
    public function getFilamentName(): string
    {
        // Kita paksa Filament baca kolom 'nama'
        // Pake operator ?? '' biar kalau null dia return string kosong (anti error)
        return $this->nama ?? 'Tanpa Nama';
    }
    // Relasi: Satu user bisa punya banyak reservasi
    public function reservasi()
    {
        return $this->hasMany(Reservasi::class, 'id_user');
    }

    // Relasi: Satu user bisa punya banyak notifikasi
    public function notifikasi()
    {
        return $this->hasMany(Notifikasi::class, 'id_user');
    }

    // Helper: Cek apakah dia admin
    public function isAdmin(): bool
    {
        return $this->role === UserRole::ADMIN;
    }
}
