<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class, 'kelas_id');
    }

    public function dosen()
    {
        return $this->hasone(Dosen::class);
    }


    protected $fillable = [
        'name',
        'jumlah',
    ];
    protected $table = 'kelas';

}
