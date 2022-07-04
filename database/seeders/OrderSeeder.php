<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Order::create([
            'user_id'=>1,
            'total_order_cost'=>100,
            'quantity'=>100,
             'status'=>1




          ]);

    }

}

