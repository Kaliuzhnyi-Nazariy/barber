<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */


    public function run(): void
    {
$services = [
    ['service' => 'adult haircut', 'price' => 39],
    ['service' => 'kids haircut', 'price' => 19],
    ['service' => 'beard trim', 'price' => 29],
    ['service' => 'neck shave', 'price' => 39],
    ['service' => 'scalp moisturizing', 'price' => 10],
    ['service' => 'beard grooming', 'price' => 49],
];

        Service::insert($services);

        // Service::factory()->create([

        // ]);
    }
}
