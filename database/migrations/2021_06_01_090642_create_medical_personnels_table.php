<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicalPersonnelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_personnels', function (Blueprint $table) {
            $table->bigIncrements('empID');
            $table->string('firstName');
            $table->string('lastName');
            $table->string('address');
            $table->integer('phone');
            $table->string('email');
            $table->date('dateOfBirth');
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
        Schema::dropIfExists('medical_personnels');
    }
}
