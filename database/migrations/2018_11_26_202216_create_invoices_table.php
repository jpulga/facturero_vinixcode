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
            $table->string('invoice_number', 255)->unique();
            $table->string('company_origin', 255);
            $table->string('client', 255);
            $table->date('date');
            $table->date('expiration_date');
            $table->string('document_type', 255);
            $table->string('document_number', 255)->nullable();
            $table->string('cellphone', 255)->nullable();
            $table->string('address', 255)->nullable();
            $table->string('currency', 3);
            $table->string('state', 255);
            $table->text('notes');
            $table->string('sub_total', 255);
            $table->string('discount', 255);
            $table->string('grand_total', 255);          
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
