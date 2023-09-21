<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemVariationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('item_variations')->truncate();
        DB::table('item_variations')->insert(
            [
                [
                    'id' => 1,
                    'item_id' => 1,
                    'item_attribute_id' => 1,
                    'item_attribute_option_id' => 1
                ],
                [
                    'id' => 2,
                    'item_id' => 1,
                    'item_attribute_id' => 1,
                    'item_attribute_option_id' => 2
                ],
                [
                    'id' => 3,
                    'item_id' => 2,
                    'item_attribute_id' => 2,
                    'item_attribute_option_id' => 3
                ],
                [
                    'id' => 4,
                    'item_id' => 2,
                    'item_attribute_id' => 2,
                    'item_attribute_option_id' => 4
                ],
                [
                    'id' => 5,
                    'item_id' => 1,
                    'item_attribute_id' => 2,
                    'item_attribute_option_id' => 3
                ],
                [
                    'id' => 6,
                    'item_id' => 1,
                    'item_attribute_id' => 2,
                    'item_attribute_option_id' => 4
                ],
                
            ]
        );
    }
}
