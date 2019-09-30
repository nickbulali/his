<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Counter;

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
            $table->timestamps();
        });

         Counter::create([
            'key' => 'invoice',
            'prefix' => 'INV-',
            'value' => 10000
        ]);

         Counter::create([
            'key' => 'payment',
            'prefix' => 'PMT-',
            'value' => 10000
        ]);
        

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
            $table->string('status');
            $table->string('description')->nullable();
            $table->double('sub_total');
            $table->double('discount')->default(0);
            $table->double('tax');
            $table->double('total');
            $table->timestamps();
        });

        //Create Payment table
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('number')->unique();
            $table->integer('invoice_id')->unsigned();
            $table->date('date');
            $table->string('status');
            $table->string('method');
            $table->text('description');
            $table->double('amount');
            $table->double('balance');
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
        Schema::dropIfExists('payments');
        Schema::dropIfExists('invoice_items');
        Schema::dropIfExists('item_categories');
    }
}
