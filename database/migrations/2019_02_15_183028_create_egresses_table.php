<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEgressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('egresses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('exit_number', 255)->unique();
            $table->string('turned', 255);
            $table->string('document_type', 255);
            $table->string('document_number', 255)->nullable();
            $table->date('date');
            $table->string('value', 255);
            $table->string('value_in_letters', 255);
            $table->text('description');
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
        Schema::dropIfExists('egresses');
    }
}
