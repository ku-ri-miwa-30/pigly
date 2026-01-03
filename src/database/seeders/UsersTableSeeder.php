<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => 'Tanaka Tomo',
            'email' => 'abcdef@gmail.com',
            'password' => Hash::make('abcdef1111'),
        ];
        User::create($param);
    }
}
