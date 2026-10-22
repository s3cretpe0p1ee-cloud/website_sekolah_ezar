<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BkkLowongan extends Model
{
    protected $fillable = [
        'posisi',
        'perusahaan',
        'logo',
        'lokasi',
        'tipe',
        'gaji',
        'deskripsi',
        'link',
        'aktif',
    ];

    protected $casts = [
        'aktif' => 'boolean',
    ];
}
