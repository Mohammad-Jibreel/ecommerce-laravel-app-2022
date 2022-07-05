<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'name' => 'women  T-Shirt',
                'description' => "Amazon Essentials Women's Classic-Fit Short-Sleeve Crewneck T-Shirt, Pack of 2                ",
                'image' => 'https://preview.colorlib.com/theme/estore/assets/img/categori/xproduct3.png.pagespeed.ic.7lSBCQxjjP.webp',
                'price' => 40,
                'quantity'=>5,
                'color'=>'#D54627',
                'category_id'=>1
            ],
            [
                'name' => 'women T-Shirt',
                'description' => "Amazon Essentials Women's Classic-Fit Short-Sleeve Crewneck T-Shirt, Pack of 2                ",
                'image' => 'https://preview.colorlib.com/theme/estore/assets/img/categori/xproduct4.png.pagespeed.ic.w.webp',
                'price' => 10,
                'quantity'=>20,
                'color'=>'#799DC9',
                'category_id'=>1



            ],
            [
                'name' => 'Men shirt',
                'description' => "Amazon Essentials Men's Regular-Fit Cotton Pique Polo Shirt (Limited Edition Colors)                ",
                'image' => 'https://m.media-amazon.com/images/I/915TsbWvuQL._AC_UX522_.jpg',
                'price' => 30,
                'quantity'=>100,
                'color'=>'#25A8B5',
                'category_id'=>2



            ],
            [
                'name' => 'Men Pants',
                'description' => "Men's Cargo Pants Casual Lightweight Drawstrintg Elastic Waist Relaxed Fit Beach Sports Pockets Jogger Pants Trouser",
                'image' => 'https://preview.colorlib.com/theme/estore/assets/img/categori/xproduct5.png.pagespeed.ic.w.webp',
                'price' => 70,
                'quantity'=>40,
                'color'=>'#916216',
                'category_id'=>1



            ],
            [
                'name' => 'Kids Baby',
                'description' => "Kids Baby Girls Outfits Floral Ruffle Off Shoulder Crop Tops + Bowknot Denim Shorts Skirt Set Toddler Summer Clothes",
                'image' => 'https://preview.colorlib.com/theme/estore/assets/img/categori/xproduct2.png.pagespeed.ic.w.webp',
                'price' => 90,
                'quantity'=>200,
                'color'=>'#CF15B9',
                'category_id'=>3



            ]

        ];

        foreach ($products as $key => $value) {
            Product::create($value);
        }
    }
}
