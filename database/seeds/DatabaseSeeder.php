<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategorySeeder::class);
        $this->call(ItemSeeder::class);
        $this->call(ItemAttributeSeeder::class);
        $this->call(ItemAttributeOptionSeeder::class);
        $this->call(ItemVariationSeeder::class);
        $this->call(ItemLinksSeeder::class);
    }
}
