<?php

namespace Database\Seeders;

use App\Models\Drug;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DrugSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Drug::insert([
            [
                'name' => 'Acetaminophen',
                'weight' => '10mg',
                'price' => '50',
                'status' => '0',
            ],
            [
                'name' => 'Adderall',
                'weight' => '5mg',
                'price' => '7',
                'status' => '0',
            ],
            [
                'name' => 'Amitriptyline',
                'weight' => '5mg',
                'price' => '2',
                'status' => '0',
            ],
            [
                'name' => 'Amlodipine',
                'weight' => '10mg',
                'price' => '19',
                'status' => '0',
            ],
            [
                'name' => 'Amoxicillin',
                'weight' => '5mg',
                'price' => '50',
                'status' => '0',
            ],
            [
                'name' => 'Ativan',
                'weight' => '7mg',
                'price' => '100',
                'status' => '0',
            ],
            [
                'name' => 'Atorvastatin',
                'weight' => '5mg',
                'price' => '5',
                'status' => '0',
            ],
            [
                'name' => 'Azithromycin',
                'weight' => '3mg',
                'price' => '34.50',
                'status' => '0',
            ]
        ]);
    }
}
