<?php

namespace Database\Seeders;

use App\Models\Book;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('id_ID');

        for ($i=0; $i < 20; $i++) { 
            $book = new Book();

            $book->isbn = $faker->randomNumber(8);
            $book->title = $faker->jobTitle;
            $book->year = $faker->year($max = 'now');

            $book->publisher_id = rand(1,20);
            $book->author_id = rand(1,20);
            $book->catalog_id = rand(1,4);

            $book->qty = rand(10,30);
            $book->price = rand(5000, 30000);

            $book->save();
        }
    }
}
