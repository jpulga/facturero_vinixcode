<?php

use Illuminate\Database\Seeder;
use App\Egress;

class EgressesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Egress::class, 80)->create();
    }
}
