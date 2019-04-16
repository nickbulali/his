<?php

use Illuminate\Database\Seeder;
use App\Models\Item;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Item::truncate();

        foreach(range(10, 60) as $i) {
            Item::create([
                'item_code' => 'PDT-1000'.$i,
                'description' => 'Name of Item '.$i,
                'item_category_id' => 1,
                'unit_price' => mt_rand(100, 1000)
            ]);
        }
    }
}
