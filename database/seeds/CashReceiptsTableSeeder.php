<?php

use Illuminate\Database\Seeder;
use App\CashReceipt;

class CashReceiptsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(CashReceipt::class, 80)->create();
    }
}
