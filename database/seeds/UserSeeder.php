<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Anderson García',
            'email' => 'eadicdesarrolador2@gmail.com',
            'password' => Hash::make('12345678'),
        ]);

        User::create([
            'name' => 'Diego Reyes',
            'email' => 'eadiccoordinadorit1@gmail.com',
            'password' => Hash::make('12345678'),
        ]);
        User::create([
            'name' => 'Anderson Gonzalez',
            'email' => 'andersongonzalez.eadic@gmail.com',
            'password' => Hash::make('12345678'),
        ]);
    }
}
