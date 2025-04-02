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
            'name'=>'admin',
            'email'=>'tuan123@gmail.com',
            'password'=>Hash::make('12345678'),
            'role'=>'admin'
        ]);
        
        User::create([
            'name'=>'users',
            'email'=>'tu23@gmail.com',
            'password'=>Hash::make('123'),
            'role'=>'user'
        ]);
    }
}
