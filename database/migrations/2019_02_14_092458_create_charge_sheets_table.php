<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChargeSheetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('charge_sheets', function (Blueprint $table) {
            $table->increments('id');
             $table->double('cost');
            $table->string('covered_by');
            $table->integer('test_type_id')->unsigned()->foreign('test_type_id')->references('id')->on('test_types');
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
        Schema::dropIfExists('charge_sheets');
    }
}
