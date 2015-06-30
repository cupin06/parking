<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParkingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parking', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('vehicle_id');
            $table->string('user_id');
            $table->integer('hours');
            $table->integer('minutes');
            $table->decimal('latitude', 12, 9);
            $table->decimal('longitude', 12, 9);
            $table->decimal('price', 4, 2);
            $table->tinyInteger('payment_status');
            $table->tinyInteger('status');
            $table->dateTime('start_time');
            $table->dateTime('end_time');
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
        Schema::drop('parking');
    }
}
