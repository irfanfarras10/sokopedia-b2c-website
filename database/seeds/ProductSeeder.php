<?php

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
        DB::table('products')->insert([
            [
                'category_id' => 1,
                'name' => 'Apple AirPods with Charging Case (Wired)',
                'description' => 'Ready stock',
                'price' => 5000000,
                'image' => 'product_images/product1.jpg'
            ],
            [
                'category_id' => 2,
                'name' => 'Canon EOS REBEL T7 DSLR Camera|2 Lens Kit with EF18-55mm + EF 75-300mm Lens, Black',
                'description' => 'Ready stock',
                'price' => 12000000,
                'image' => 'product_images/product2.jpg'
            ],
            [
                'category_id' => 3,
                'name' => 'Seagate Portable 2TB External Hard Drive Portable HDD – USB 3.0 for PC, Mac, PS4, & Xbox - 1-year Rescue Service (STGX2000400)',
                'description' => 'Ready stock',
                'price' => 5000000,
                'image' => 'product_images/product3.jpg'
            ],
            [
                'category_id' => 4,
                'name' => 'Acer Aspire 5 Slim Laptop, 15.6 inches Full HD IPS Display, AMD Ryzen 3 3200U, Vega 3 Graphics, 4GB DDR4, 128GB SSD, Backlit Keyboard, Windows 10 in S Mode, A515-43-R19L, Silver',
                'description' => 'Ready stock',
                'price' => 8000000,
                'image' => 'product_images/product4.jpg'
            ]
        ]);
    }
}
