<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->truncate();
        DB::table('items')->insert(
            [
                [
                    'id' => 1,
                    'name' => 'Acer. Acer Chromebook',
                    'category_id' => 1,
                    'description' => 'This Lenovo Acer 714 is a refurbished laptop that has been restored to its original condition. It features a powerful Core i5 3rd generation processor that delivers fast and efficient performance. With 8GB of RAM, this laptop can handle multiple applications and tasks with ease. The 500GB HDD provides ample storage space for all your files, documents, and media.',
                    'base_price' => 780,
                    'thumbnail_url' => 'https://bigdeals.lk/uploads/product/normal/lvpclcel4gb38dnew.png'
                ],
            ]
        );
    }
}
