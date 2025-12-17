<?php

namespace App\Models;

use App\StatusReservasi;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    use HasFactory;

    protected $table = 'reservasi';
    protected $guarded = ['id'];

    protected $casts = [
        'status' => StatusReservasi::class, // Auto convert ke Enum
        'tanggal' => 'date',                // Jadi object Carbon (gampang format tgl)
        'dibaca_pada' => 'datetime',
    ];

    // Relasi: Siapa yang booking?
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    // Relasi: Booking kelas apa?
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }
}
