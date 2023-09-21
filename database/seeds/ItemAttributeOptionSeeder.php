<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemAttributeOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('item_attribute_options')->truncate();
        DB::table('item_attribute_options')->insert(
            [
                [
                    'id' => 1,
                    'item_attribute_id' => 1,
                    'name' => '17-Inch',
                    'price_adjustment'=> 50
                ],
                [
                    'id' => 2,
                    'item_attribute_id' => 1,
                    'name' => '19-Inch',
                    'price_adjustment'=> 60
                ],
                [
                    'id' => 3,
                    'item_attribute_id' => 2,
                    'name' => 'Black',
                    'price_adjustment'=> 20
                ],
                [
                    'id' => 4,
                    'item_attribute_id' => 2,
                    'name' => 'Silver',
                    'price_adjustment'=> 30                ]
            ]
        );
    }
}
