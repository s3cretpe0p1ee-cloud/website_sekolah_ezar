<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SiswaUserSeeder extends Seeder
{
    public function run(): void
    {
        $user = new User;

        $user->name = 'Siswa Demo';
        $user->email = 'siswa@infokom.sch.id';
        $user->password = Hash::make('Siswa12345');
        $user->role = 'siswa';

        $user->save();
    }
}