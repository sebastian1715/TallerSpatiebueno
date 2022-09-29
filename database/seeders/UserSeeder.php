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
     *
     * @return void
     */
    public function run()
    {
        User::Create([
            'name'=>'Juan Carlos',
            'email'=>'juan@misena.edu.co',
            'password'=>Hash::make('12345')
        ])->assignRole('admin');

        User::Create([
            'name'=>'Andres Stiven',
            'email'=>'stiven@misena.edu.co',
            'password'=>Hash::make('123456')
        ])->assignRole('user');

        User::Create([
            'name'=>'Fabian Stiven',
            'email'=>'fabian@misena.edu.co',
            'password'=>Hash::make('12345')
        ])->assignRole('user');
    }
}
