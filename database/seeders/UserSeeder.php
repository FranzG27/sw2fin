<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'=>'Guillermo Cespedes Lazarte',
            'email'=>'guillermo@gmail.com',
            'isAdmin'=>true,
            'password'=>Hash::make('123123'),
        ]);

        User::create([
            'name'=>'Franz Rodrigo Garcia Villarroel',
            'email'=>'franz@gmail.com',
            'isAdmin'=>true,
            'password'=>Hash::make('123123'),
        ]);
    }
}
