<?php

namespace App;

enum StatusReservasi: string
{
    case PENDING = 'pending';
    case DITERIMA = 'diterima';
    case DITOLAK = 'ditolak';

    // Method buat dapetin Label yang enak dibaca user
    public function label(): string
    {
        return match ($this) {
            self::PENDING => 'Menunggu Konfirmasi',
            self::DITERIMA => 'Disetujui',
            self::DITOLAK => 'Maaf, Ditolak',
        };
    }

    // Method buat dapetin warna (Misal buat class Bootstrap/Tailwind)
    public function color(): string
    {
        return match ($this) {
            self::PENDING => 'warning', // atau 'text-yellow-500' kalo pake tailwind
            self::DITERIMA => 'success', // atau 'text-green-500'
            self::DITOLAK => 'danger',  // atau 'text-red-500'
        };
    }   //
}
