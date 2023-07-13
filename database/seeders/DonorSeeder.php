<?php

namespace Database\Seeders;

use App\Models\Donor;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DonorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        Donor::create([
            'fullName'=>'Carlos Eduardo Castillo Flores',
            'email'=>'carlos@gmail.com',
            'password'=>Hash::make('123123'),
            'ci'=>'5599236 SC',
            'birthdate'=>Carbon::parse('2001-05-15'),
            'cellphone'=>'78009636',
            'photo1'=>' ',
            'photo2'=>' ',
        ]);

        Donor::create([
            'fullName'=>'Eliana Perez Gonzalez',
            'email'=>'eliana@gmail.com',
            'password'=>Hash::make('123123'),
            'ci'=>'2099236 SC',
            'birthdate'=>Carbon::parse('1995-05-25'),
            'cellphone'=>'78009636',
            'photo1'=>' ',
            'photo2'=>' ',
        ]);

    }
}
