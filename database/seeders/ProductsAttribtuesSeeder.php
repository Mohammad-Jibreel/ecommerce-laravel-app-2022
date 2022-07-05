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
              'product_id'=>2,
              'size'=>3
            ]);
            ProductsAttribtues::create([
              'product_id'=>2,
              'size'=>2
            ]);
            ProductsAttribtues::create([
              'product_id'=>2,
              'size'=>4
            ]);
            ProductsAttribtues::create([
                'product_id'=>1,
                'size'=>0
              ]);

              ProductsAttribtues::create([
                'product_id'=>3,
                'size'=>2
              ]);
              ProductsAttribtues::create([
                  'product_id'=>3,
                  'size'=>1
                ]);
                ProductsAttribtues::create([
                  'product_id'=>4,
                  'size'=>1
                ]);
                ProductsAttribtues::create([
                  'product_id'=>2,
                  'size'=>0
                ]);
                ProductsAttribtues::create([
                    'product_id'=>4,
                    'size'=>1
                  ]);
                  ProductsAttribtues::create([
                    'product_id'=>4,
                    'size'=>0
                  ]);
    }
}
