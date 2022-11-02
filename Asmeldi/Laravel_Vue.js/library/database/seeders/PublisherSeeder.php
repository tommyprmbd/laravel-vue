<?php

namespace Database\Seeders;

use App\Models\Publisher;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class PublisherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 200; $i++) {
            $Publisher = new Publisher();

            $Publisher->name = $faker->name;
            $Publisher->email = $faker->email;
            $Publisher->phone_number = '0813' . $faker->randomNumber(8);
            $Publisher->adress = $faker->address;

            $Publisher->save();
        }
    }
}
