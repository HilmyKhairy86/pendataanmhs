<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mahasiswa extends Model
{
    use HasFactory;
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }
    public function request()
    {
        return $this->belongsTo(Request::class, 'mahasiswa_id');
    }
    protected $table = 'mahasiswa';
    // protected $primaryKey = 'user_id';
    protected $fillable = [
        'user_id',
        'name',
        'nim',
        'tempat_lahir',
        'tanggal_lahir',
    ];
}
