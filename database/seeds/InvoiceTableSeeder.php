<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Invoice;
use App\InvoiceProduct;

class InvoiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        Invoice::truncate();
        InvoiceProduct::truncate();

        foreach(range(1, 20) as $i){
            $products = collect();

            foreach(range(1, mt_rand(2, 10)) as $i){
                $price = $faker->numberBetween(100, 1000);
                $qty = $faker->numberBetween(1, 20);
                $products->push(new InvoiceProduct([
                    'name' => $faker->sentence,
                    'price' => $price,
                    'qty' => $qty,
                    'total' => ($qty * $price)
                ]));
            }

            $subTotal = $products->sum('total');
            $discount = $faker->numberBetween(10, 20);
            $grandTotal = $subTotal - $discount;

            $invoice = Invoice::create([
                'invoice_number' => $faker->numberBetween(10000, 40000),
                'company_origin' => $faker->name,
                'client' => $faker->name,
                'date' => $faker->date(),
                'expiration_date' => $faker->date(),
                'document_type' => $faker->name,
                'document_number' => $faker->numberBetween(10000, 40000),
                'cellphone' => $faker->numberBetween(10000, 40000),
                'address' => $faker->address,
                'currency' => $faker->name, 
                'state' => $faker->name, 
                'notes' => $faker->name,
                'discount' => $discount,
                'sub_total' => $subTotal,
                'grand_total' => $grandTotal
            ]);

            $invoice->products()->saveMany($products);
        }
    }
}
