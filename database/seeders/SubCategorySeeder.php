<?php

namespace Database\Seeders;

use App\Models\SubCategory;
use Illuminate\Database\Seeder;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SubCategory::create([
          'name'=>'Jackets',
          'category_id'=>1
        ]);
        SubCategory::create([
            'name'=>'Pants',
            'category_id'=>1
          ]);
          SubCategory::create([
            'name'=>' Sweaters & Shirts',
            'category_id'=>2
          ]);
          SubCategory::create([
            'name'=>'Shoes',
            'category_id'=>2
          ]);
          SubCategory::create([
            'name'=>'Bags',
            'category_id'=>2
          ]);
          SubCategory::create([
            'name'=>'Accessories',
            'category_id'=>3
          ]);



    }
}
