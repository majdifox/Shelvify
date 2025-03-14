<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Produit1',
            'description' => 'chchchcchchhhchchh',
            'price' => '20',
            'stock_quantity' => '10',
            'threshold_quantity' => '10',
            'aisle_id' => '1',
            'category_id' => '1',
        ]);
    }
}
