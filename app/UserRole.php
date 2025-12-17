<?php

namespace App;

enum UserRole: string
{
    case ADMIN = 'admin';
    case USER = 'user';

    // Opsional: Kalo mau bikin label cantik buat tampilan
    public function label(): string
    {
        return match ($this) {
            self::ADMIN => 'Administrator',
            self::USER => 'Mahasiswa/User',
        };
    }
}
