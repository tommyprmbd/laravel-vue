<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i=0; $i < 15; $i++){
        	$supplier = new supplier;

        	$supplier->name = $faker->name;
        	$supplier->address = $faker->address;
        	$supplier->phone_number = '0821'.$faker->randomNumber(8);

        	$supplier->save();
   	    }
	}
}