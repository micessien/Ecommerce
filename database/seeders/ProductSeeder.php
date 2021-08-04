<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('products')->insert([
            [
                'name'=>'Oppo mobile',
                'price'=>'300',
                'description'=>'A smartphone with 8gb ram and much more feature',
                'category'=>'mobile',
                'gallery'=>'https://image.oppo.com/content/dam/oppo/common/mkt/v2-2/reno4-pro-4g/navigation/Reno4%20pro-4g-navigation-blue-v2.png'
            ],
            [
                'name'=>'Panasonic tv',
                'price'=>'400',
                'description'=>'A smarttv with much more feature',
                'category'=>'tv',
                'gallery'=>'https://mans.io/images/1020348/1047844.jpg'
            ],
            [
                'name'=>'Samsung tv',
                'price'=>'500',
                'description'=>'A smarttv with much more feature',
                'category'=>'tv',
                'gallery'=>'https://images.samsung.com/is/image/samsung/africa-en-full-hd-n5000-ua40n5000arxxa-frontblack-154997819?$720_576_PNG$'
            ],
            [
                'name'=>'LG fridge',
                'price'=>'200',
                'description'=>'A fridge with much more feature',
                'category'=>'fridge',
                'gallery'=>'https://cdn11.bigcommerce.com/s-pn0xk59eoa/images/stencil/1280x1280/products/395/2999/printproof-black-stainless-steel-lg-electronics-french-door-refrigerators-lrmvc2306d-64_1000__72173.1601317353.jpg'
            ],
        ]);
    }
}
