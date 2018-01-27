<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaypalTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pay_pal_transactions', function (Blueprint $table){
            $table->increments('id');
            $table->string('transaction_id');
            $table->integer('user_id');
            $table->integer('amount');
            $table->integer('price');
            $table->timestamps();
        });

        Schema::table('pay_pal_transactions', function (Blueprint $table) {
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
        Schema::dropIfExists('pay_pal_transactions');
    }
}
