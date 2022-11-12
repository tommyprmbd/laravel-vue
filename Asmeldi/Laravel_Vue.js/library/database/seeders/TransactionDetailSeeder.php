<?php

namespace Database\Seeders;

use App\Models\transactionDetail;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class TransactionDetailSeeder extends Seeder
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
            $transactionDetail = new transactionDetail();

            $transactionDetail->transaction_id = rand(1, 200);
            $transactionDetail->qty = rand(1, 200);
            $transactionDetail->book_id = rand(1, 200);


            $transactionDetail->save();
        }
    }
}
