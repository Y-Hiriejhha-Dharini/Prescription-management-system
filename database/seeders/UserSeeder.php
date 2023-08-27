<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'address' => 'Colombo 6',
                'contact_no' => '0776543218',
                'dob' => '1994-12-19',
                'user_type' => 'admin',
                'password' => bcrypt('12345678')
            ],
            [
                'name' => 'pharmacy',
                'email' => 'pharmacy@gmail.com',
                'address' => 'colomo 01',
                'contact_no' => '0775437652',
                'dob' => '1997-12-28',
                'user_type' => 'pharmacy',
                'password' => bcrypt('12345678')
            ]
        ]);
    }
}
