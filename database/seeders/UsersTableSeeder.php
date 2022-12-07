<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Sergio Vargas Luna',
            'email' => 'sergio@hannahsoftware.com.mx',
            'email_verified_at' => now(),
            'password' => \Hash::make('aSDK!3412'),
        ]);
    }
}
