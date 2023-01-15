<?php

namespace Database\Seeders;

use App\Models\Transaction;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i=0; $i < 20; $i++){
        	$transaction = new Transaction;

        	$transaction->member_id = rand(1,20);
        	$transaction->date_start = rand(201001,201020);
        	$transaction->date_end = rand(201101,201120);


        	$transaction->save();
        }
    }
}
