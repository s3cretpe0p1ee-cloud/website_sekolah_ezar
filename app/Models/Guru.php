<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $fillable = [
        'nip',
        'nama',
        'jabatan',
        'email',
        'foto',
        'kategori',
    ];

    public function peran()
    {
        return $this->hasMany(GuruPeran::class);
    }
}