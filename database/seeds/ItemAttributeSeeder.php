<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemAttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('item_attributes')->truncate();
        DB::table('item_attributes')->insert(
            [
                [
                    'id' => 1,
                    'name' => 'Size'
                ],
                [
                    'id' => 2,
                    'name' => 'Color'
                ]
            ]
        );
    }
}
