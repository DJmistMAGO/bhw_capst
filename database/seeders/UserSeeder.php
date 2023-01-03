<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!User::where('user_name', 'treseBHW')->first()) {
            $user = User::create([
                'name' => 'Admin',
                'user_name' => 'treseBHW',
                'password' => Hash::make('admintrese')
            ]);
        }
    }
}
