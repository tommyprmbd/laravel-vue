<?php

namespace Database\Seeders;

use App\Models\Member;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MembersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i=0; $i < 20; $i++) { 
            $member = new Member;

            $member->nama = $faker->name;
            $member->gender = $faker->randomElement(['l', 'p']);
            $member->phone =  '089'.$faker->randomNumber(9);
            $member->address = $faker->address;
            $member->email = $faker->email;

            $member->save();

        }
    }
}
