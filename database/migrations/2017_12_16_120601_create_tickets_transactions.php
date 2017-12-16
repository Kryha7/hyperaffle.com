<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTransactions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets_transactions', function (Blueprint $table){
            $table->increments('id');
            $table->integer('raffle_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('amount')->unsigned();
            $table->timestamps();
        });

        Schema::table('tickets_transactions', function (Blueprint $table) {
            $table->foreign('raffle_id')
                ->references('id')
                ->on('raffles');

            $table->foreign('user_id')
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
        //
    }
}
