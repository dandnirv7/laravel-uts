<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    protected $table = 'pendaftaran';
    protected $fillable = [
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'hp',
        'email',
        'nominal',
        'bank',
        'anbank',
        'gambar',
        'tanggal_transfer',
        'ipaddress',
        'tanggal'
    ];
}