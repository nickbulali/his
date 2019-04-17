<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Counter;

class CreateCountersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
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
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('counters');
    }
}
