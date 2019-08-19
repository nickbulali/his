<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class HisTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Create Invoice Counter Table
        Schema::create('counters', function (Blueprint $table) {
            $table->increments('id');
            $table->string('key')->unique();
            $table->string('prefix');
            $table->string('value');
            $table->string('invoice_no')->unique();
            $table->integer('encounter_id')->unsigned()
                ->foreign('encounter_id')->references('id')->on('encounters');
            $table->string('opened_by');
            $table->boolean('status');
            $table->double('total')->default(0);
            $table->timestamps();
        });
        /*Counter::create([
            'key' => 'invoice',
            'prefix' => 'INV-',
            'value' => 10000
        ]);*/

        //Create Items table for chargesheet
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('item_category_id')->references('id')->on('item_categories')->nullable();
            $table->string('item_code')->unique();
            $table->text('description');
            $table->double('unit_price');
            $table->timestamps();
        });

        //Create Invoice table
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('number')->unique();
            $table->integer('patient_id')->unsigned();
            $table->date('date');
            $table->date('due_date');
            $table->boolean('status')->default(0);
            $table->string('reference')->nullable();
            $table->text('terms_and_conditions');
            $table->double('sub_total');
            $table->double('discount')->default(0);
            $table->double('total');
            $table->timestamps();
        });

        Schema::create('invoice_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('invoice_id')->unsigned();
            $table->integer('item_id')->unsigned();
            $table->double('unit_price');
            $table->integer('qty');
            $table->timestamps();
        });

        //Create Items Category table
        Schema::create('item_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
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
        Schema::dropIfExists('counters');
        Schema::dropIfExists('items');
        Schema::dropIfExists('invoices');
        Schema::dropIfExists('invoice_items');
        Schema::dropIfExists('item_categories');
    }
}
