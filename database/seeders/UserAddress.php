<?php

namespace Database\Seeders;

use App\Models\UserAddress as ModelsUserAddress;
use Illuminate\Database\Seeder;

class UserAddress extends Seeder
{
    // $table->text('address_line_1');
    // $table->text('address_line_2')->nullable();
    // $table->string('city');
    // $table->string('state')->nullable();
    // $table->string('country');
    // $table->string('postal_code');
    // $table->unsignedInteger('user_id')->on('id')->refrence('users')->onDelete('cascade');
    public function run()
    {
        ModelsUserAddress::create([
          'address_line_1'=>'amman',
          'address_line_2'=>'abu alnda',
          'city'=>'amman',
          'state'=>'amman',
          'country'=>'jordan',
          'postal_code'=>11856,
          'user_id'=>1

                    ]);

    }
}
