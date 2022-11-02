<?php

namespace Database\Seeders;

use App\Models\transaction;
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

        for ($i = 0; $i < 200; $i++) {
            $transaction = new transaction();

            $transaction->member_id = rand(1, 200);
            $transaction->date_start = date('Y-m-d');
            $transaction->date_end = date('Y-m-d');

            $transaction->save();
            
        }

    }
}
