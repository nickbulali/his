<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        $faker = \Faker\Factory::create();

        User::create([
                'name' => 'HIS Super Admin',
                'email' => 'admin@his.local',
                'password'=>'$2y$10$DAaAMv/Rx7fMRWuKvmMEbusMCHQBXOzophDqdqWyeCLcGi1Ih84o.'
            ]);
        
        for ($i = 0; $i < 50; $i++) {
            User::create([
                'name' => $faker->firstName,
                'email' => $faker->unique()->email,
                'password'=>$faker->password
            ]);
        }
    }
}
