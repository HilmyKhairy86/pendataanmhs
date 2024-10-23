<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class,'id');
    }
    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
    protected $table = 'dosen';
    // protected $primaryKey = 'user_id';
    protected $fillable = [
        'user_id',
        'name',
        'nip',
        'kode_dosen',
    ];
}
