<?php

namespace Database\Seeders;

use App\Models\ProductsAttribtues;
use Illuminate\Database\Seeder;

class ProductsAttribtuesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductsAttribtues::create([
            'product_id'=>1,
            'size'=>2
          ]);
          ProductsAttribtues::create([
              'product_id'=>1,
              'size'=>2
            ]);
            ProductsAttribtues::create([
              'product_id'=>2,
              'size'=>2
            ]);
            ProductsAttribtues::create([
              'product_id'=>1,
              'size'=>4
            ]);
    }
}
