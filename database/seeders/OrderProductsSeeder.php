<?php

namespace Database\Seeders;

use App\Models\Order_product;
use Illuminate\Database\Seeder;

class OrderProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Order_product::create([
'product_id'=>'1',
'order_id'=>'1',

        ]);
        Order_product::create([
            'product_id'=>'2',
            'order_id'=>'1',

                    ]);
                    Order_product::create([
                        'product_id'=>'3',
                        'order_id'=>'1',

                                ]);
        Order_product::create([
            'product_id'=>'2',
            'order_id'=>'1',

                    ]);


    }
}
