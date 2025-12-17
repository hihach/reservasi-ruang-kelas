<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifikasi extends Model
{
    use HasFactory;

    protected $table = 'notifikasi';
    protected $guarded = ['id'];

    protected $casts = [
        'is_read' => 'boolean', // 0/1 jadi true/false
    ];

    // Relasi: Notif ini punya siapa?
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
