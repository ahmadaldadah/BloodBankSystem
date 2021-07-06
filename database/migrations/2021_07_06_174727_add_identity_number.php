<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdentityNumber extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('donors', function (Blueprint $table) {
            $table->string('identityNumber');
        });
        Schema::table('recipients', function (Blueprint $table) {
            $table->string('identityNumber');
        });
        Schema::table('medical_personnels', function (Blueprint $table) {
            $table->string('identityNumber');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('donors', function (Blueprint $table) {
            $table->dropColumn('identityNumber');
        });
        Schema::table('recipients', function (Blueprint $table) {
            $table->dropColumn('identityNumber');
        });
        Schema::table('medical_personnels', function (Blueprint $table) {
            $table->dropColumn('identityNumber');
        });
    }
}
