<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;
    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class, 'user_id');
    }
    public $fillable = [
        'kelas_id',
        'mahasiswa_id',
        'keterangan',
    ];
    protected $table = 'requests';
}
