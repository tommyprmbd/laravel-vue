<?php

namespace Database\Seeders;

use App\Models\TransactionDetail;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

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

        for ($i=0; $i < 20; $i++){
        	$transactiondetail = new TransactionDetail;

        	$transactiondetail->transaction_id = rand(1,20);
        	$transactiondetail->book_id = rand(1,20);
        	$transactiondetail->qty = rand(1,4);


        	$transactiondetail->save();
        }
    }
}
