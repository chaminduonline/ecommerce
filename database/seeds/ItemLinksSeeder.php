<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemLinksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('image_links')->truncate();
        DB::table('image_links')->insert(
            [
                [
                    'id' => 1,
                    'item_id' => 1,
                    'link' => "https://bigdeals.lk/uploads/product/normal/lvpclcel4gb38dnew.png",
                ],
                [
                    'id' => 2,
                    'item_id' => 1,
                    'link' => "https://bigdeals.lk/uploads/product/normal/lvpclcel4gb38dnew.png",
                ],
                [
                    'id' => 3,
                    'item_id' => 1,
                    'link' => "https://bigdeals.lk/uploads/product/normal/lvpclcel4gb38dnew.png",
                ],
                [
                    'id' => 4,
                    'item_id' => 1,
                    'link' => "https://bigdeals.lk/uploads/product/normal/lvpclcel4gb38dnew.png",
                ],
            ]
        );
    }
}
