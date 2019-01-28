<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\CashReceipt;

class CashReceiptTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        $cash_receipt = CashReceipt::create([
            'box_number' => $faker->numberBetween(10000, 40000),
            'we_received' => $faker->name,
            'address' => $faker->address,
            'city' => $faker->name,
            'document_type' => $faker->name,
            'document_number' => $faker->numberBetween(10000, 40000),
            'date' => $faker->date(),
            'value' => $faker->numberBetween(10000, 40000),
            'value_in_letters' => $faker->name,
            'description' => $faker->name 
        ]);
    }
}
