<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
         'name'=>'edraak',
         'email'=>'admin@edraakmc.com',
         'password'=>Hash::make('edraakMC_admin'),

        ]);
    }
}
