<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCashpackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cashpackages', function (Blueprint $table) {
            $table->string('cash_id');
            $table->string('cash_name');
            $table->string('cash_price');
            $table->string('cash_point');
            $table->timestamps();
        });
        //hello
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cashpackages');
    }
}
