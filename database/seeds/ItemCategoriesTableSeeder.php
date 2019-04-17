<?php

use Illuminate\Database\Seeder;
use App\Models\ItemCategory;

class ItemCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ItemCategory::truncate();

        $faker = \Faker\Factory::create(); 
        for ($i = 0; $i < 10; $i++) {
            ItemCategory::create([
                'name' => $faker->word,
                'description' => 'description of Item '.$faker->word,
            ]);
        }
    }
}
