<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Aisle;

class AisleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Aisle::create([
            'name' => 'Aisle1',
            'description' => 'Ayyayay',
            'status' => 'true',
        ]);
    }
}
