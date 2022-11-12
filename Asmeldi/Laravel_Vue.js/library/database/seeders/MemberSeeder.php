<?php

namespace Database\Seeders;

use App\Models\Members;
use Faker\Factory as Faker;

use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 20; $i++) {
            $Members = new Members();

            $Members->name = $faker->name;
            $Members->gender = $faker->randomElement(['l', 'p']);
            $Members->phone_number = '0813' . $faker->randomNumber(8);
            $Members->adress = $faker->address;
            $Members->email = $faker->email;


            $Members->save();
        }
    }
}
