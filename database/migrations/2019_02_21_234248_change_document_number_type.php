<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeDocumentNumberType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('invoices', function ($table) {
            $table->integer('invoice_number')->unsigned()->change();
        });
        Schema::table('cash_receipts', function ($table) {
            $table->integer('box_number')->unsigned()->change();
        });
        Schema::table('egresses', function ($table) {
            $table->integer('exit_number')->unsigned()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('invoices', function ($table) {
            $table->string('invoice_number', 255)->change();
        });
        Schema::table('cash_receipts', function ($table) {
            $table->string('box_number', 255)->change();
        });
        Schema::table('egresses', function ($table) {
            $table->string('exit_number', 255)->change();
        });
    }
}
