<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kaprodi extends Model
{
    use HasFactory;
    protected $table = 'kaprodi';
    protected $fillable = [
        'user_id',
        'kode_dosen',
        'nip',
        'name',
    ];
}
