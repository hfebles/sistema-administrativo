<?php

namespace Database\Seeders;

use App\Models\Products\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name_product' => 'Producto 1',
            'price_product' => 15.5,
            'product_usd_product' => 1,
            'tax_exempt_product' => 0,
            'qty_product' => 50,
            'salable_product' => 1,
        ]);

        Product::create([
            'name_product' => 'Producto 2',
            'price_product' => 28.6,
            'product_usd_product' => 1,
            'tax_exempt_product' => 1,
            'qty_product' => 50,
            'salable_product' => 1,
        ]);

        Product::create([
            'name_product' => 'Producto 3',
            'price_product' => 56.5,
            'product_usd_product' => 1,
            'tax_exempt_product' => 0,
            'qty_product' => 50,
            'salable_product' => 1,
        ]);

        Product::create([
            'name_product' => 'Producto 4',
            'price_product' => 250.35,
            'product_usd_product' => 0,
            'tax_exempt_product' => 0,
            'qty_product' => 50,
            'salable_product' => 1,
        ]);

        Product::create([
            'name_product' => 'Producto 5',
            'price_product' => 300,
            'product_usd_product' => 0,
            'tax_exempt_product' => 1,
            'qty_product' => 50,
            'salable_product' => 1,
        ]);

        Product::create([
            'name_product' => 'Producto 6',
            'price_product' => 100,
            'product_usd_product' => 0,
            'tax_exempt_product' => 0,
            'qty_product' => 50,
            'salable_product' => 1,
        ]);
    }
}
