<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('invoice_number')->unique();
            $table->string('company_origin');
            $table->string('client');
            $table->date('date');
            $table->date('expiration_date');
            $table->string('document_type');
            $table->string('document_number');
            $table->string('cellphone');
            $table->string('address');
            $table->string('currency');
            $table->string('state');
            $table->string('notes');
            $table->string('sub_total');
            $table->string('discount');
            $table->string('grand_total');          
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}
