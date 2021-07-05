<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBloodTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blood_transactions', function (Blueprint $table) {
            $table->bigIncrements('transactID');
            $table->unsignedBigInteger('empID');
            $table->dateTime('dateOut');
            $table->integer('quantity');
            $table->unsignedBigInteger('recipientsID');
            $table->string('bloodType','3');
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
        Schema::dropIfExists('blood_transactions');
    }
}
