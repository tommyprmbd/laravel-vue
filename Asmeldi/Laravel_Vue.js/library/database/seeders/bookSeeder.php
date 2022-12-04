<?php

namespace Database\Seeders;

use App\Models\books;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class bookSeeder extends Seeder
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
            $books = new books();

            $books->isbn = rand(1, 20);
            $books->title = $faker->name;
            $books->year = rand(2010, 2022);
            $books->publisher_id = rand(1, 20);
            $books->author_id = rand(1, 20);
            $books->catalog_id = rand(1, 20);
            $books->qty = rand(1, 20);
            $books->price = rand(10000, 200000);

            $books->save();
        }
    }
}
