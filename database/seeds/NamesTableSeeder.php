<?php

use Illuminate\Database\Seeder;
use App\Models\Name;

class NamesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Name::truncate();

        $faker = \Faker\Factory::create();
        
        for ($i = 0; $i < 100; $i++) {
            Name::create([
                'text' => $faker->name,
                'family' => $faker->lastName,
                'given'=>$faker->firstName,
                'suffix'=>$faker->suffix,
            ]);
        }
    }
}
