<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lantai extends Model
{
    use HasFactory;

    protected $table = 'lantai'; // Paksa nama tabel (takutnya Laravel nyari 'lantais')
    protected $guarded = ['id'];

    // Relasi: Satu lantai punya banyak kelas
    public function kelas()
    {
        return $this->hasMany(Kelas::class, 'id_lantai');
    }
}
