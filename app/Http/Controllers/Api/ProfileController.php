<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    // GET profile user
    public function show(Request $request)
    {
        return response()->json([
            'message' => 'Profile data retrieved',
            'user' => $request->user()
        ]);
    }

    // UPDATE profile user
    public function update(Request $request)
    {
        $user = $request->user();

        $user->update([
            'nama' => $request->nama, // ✅ FIX DI SINI
            'nim' => $request->nim,
            'username' => $request->username,
            'email' => $request->email,
            'agama' => $request->agama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'Angkatan' => $request->Angkatan,
            'Kelas' => $request->Kelas,
            'Status' => $request->Status,
            'program_studi' => $request->program_studi,
        ]);

        return response()->json([
            'message' => 'Profile updated successfully',
            'user' => [
                'nama' => $user->nama, // 🔥 samakan dengan frontend
                'nim' => $user->nim,
                'username' => $user->username,
                'email' => $user->email,
                'agama' => $user->agama,
                'jenis_kelamin' => $user->jenis_kelamin,
                'Angkatan' => $user->Angkatan,
                'Kelas' => $user->Kelas,
                'Status' => $user->Status,
                'program_studi' => $user->program_studi,
            ]
        ]);
    }

    // DELETE account user
    public function destroy(Request $request)
    {
        $request->validate([
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        return response()->json([
            'message' => 'Account deleted successfully'
        ]);
    }
}
