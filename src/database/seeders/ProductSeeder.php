<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        if (Product::count() == 0) {
            Product::create([
                'name' => 'Nordic Chair',
                'description' => 'Kursi nyaman',
                'price' => 50,
                'image' => 'front/images/product-1.png',
            ]);
            Product::create([
                'name' => 'Kruzo Aero Chair',
                'description' => 'Kursi keren',
                'price' => 78,
                'image' => 'front/images/product-2.png',
            ]);
            Product::create([
                'name' => 'Ergonomic Chair',
                'description' => 'Kursi ergonomis',
                'price' => 43,
                'image' => 'front/images/product-3.png',
            ]);
        }
    }
}
