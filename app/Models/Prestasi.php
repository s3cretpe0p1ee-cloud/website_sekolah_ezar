<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    protected $fillable = [
        'judul',
        'deskripsi',
        'tahun',
    ];

    /**
     * Palet warna berputar untuk kartu prestasi di halaman web.
     */
    public function getWarnaAttribute(): array
    {
        $palet = [
            ['utama' => '#d97706', 'muda' => '#fbbf24', 'soft' => 'rgba(217,119,6,0.15)', 'shadow' => 'rgba(217,119,6,0.35)'],
            ['utama' => '#2563eb', 'muda' => '#60a5fa', 'soft' => 'rgba(37,99,235,0.15)', 'shadow' => 'rgba(37,99,235,0.35)'],
            ['utama' => '#0d9488', 'muda' => '#2dd4bf', 'soft' => 'rgba(13,148,136,0.15)', 'shadow' => 'rgba(13,148,136,0.35)'],
            ['utama' => '#7c3aed', 'muda' => '#a78bfa', 'soft' => 'rgba(124,58,237,0.15)', 'shadow' => 'rgba(124,58,237,0.35)'],
            ['utama' => '#e11d48', 'muda' => '#fb7185', 'soft' => 'rgba(225,29,72,0.15)', 'shadow' => 'rgba(225,29,72,0.35)'],
        ];

        $i = $this->id ?? static::query()->pluck('id')->search($this->getKey());

        return $palet[((int) $i) % count($palet)];
    }

    /**
     */
    public function getIkonAttribute(): string
    {
        $titre = [
            'juara 1' => '🏆',
            'juara 2' => '🥈',
            'juara 3' => '🥉',
            'finalis' => '🎬',
        ];

        foreach ($titre as $kata => $ikon) {
            if (stripos($this->judul, $kata) !== false) {
                return $ikon;
            }
        }

        return '⭐';
    }
}