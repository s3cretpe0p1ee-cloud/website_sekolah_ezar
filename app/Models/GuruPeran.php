<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GuruPeran extends Model
{
    protected $table = 'guru_peran';

    protected $fillable = [
        'guru_id',
        'jenis',
        'jabatan',
        'kelas',
    ];

    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }
}