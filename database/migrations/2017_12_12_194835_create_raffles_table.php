<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRafflesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('raffles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('brand');
            $table->string('title');
            $table->integer('tickets')->unsigned();
            $table->integer('max_tickets')->unsigned();
            $table->integer('winner')->unsigned();
            $table->boolean('active');
            $table->boolean('shipped');
            $table->string('thumb');
            $table->timestamps();
        });

        Schema::table('raffles', function (Blueprint $table) {
            $table->foreign('winner')
                ->references('id')
                ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('raffles');
    }
}
