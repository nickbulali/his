<?php

use Illuminate\Database\Seeder;
use App\Models\Patient;

class PatientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Patient::truncate();

        $faker = \Faker\Factory::create();
        
        for ($i = 0; $i < 50; $i++) {
            Patient::create([
                'identifier' => $faker->ean8,
                'ulin' => $faker->uuid,
                'name_id'=>$i,
                'gender_id'=>$faker->numberBetween($min = 1, $max = 2),
                'birth_date'=>$faker->date($format = 'Y-m-d', $max = 'now'),
            ]);
        }
    }
}
