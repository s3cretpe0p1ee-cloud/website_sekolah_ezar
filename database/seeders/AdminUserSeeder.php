<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        $user = new User;

        $user->name = 'Administrator';
        $user->email = 'admin@infokom.sch.id';
        $user->password = Hash::make('Admin12345');
        $user->role = 'admin';

        $user->save();
    }
}