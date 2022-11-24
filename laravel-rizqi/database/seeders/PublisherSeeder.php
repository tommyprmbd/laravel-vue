<?php

namespace Database\Seeders;

use App\Models\Publisher;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $faker = Factory::create();

        for ($i=0; $i < 20; $i++) { 
            $publisher = new Publisher;

            $publisher->nama = $faker->name;
            $publisher->email = $faker->email;
            $publisher->phone = '087'.$faker->randomNumber(9);
            $publisher->address = $faker->address;

            $publisher->save();
        }
    }
}
