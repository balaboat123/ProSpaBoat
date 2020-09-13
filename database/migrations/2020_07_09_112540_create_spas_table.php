<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spas', function (Blueprint $table) {
            $table->bigIncrements('spa_id');
            $table->string('spa_name');
            $table->string('spa_image');
            $table->string('spa_description');
            $table->decimal('spa_price',8,2);//ราคา
            $table->string('spa_time');//จำนวนเวลา
            $table->string('spa_timeunit');//หน่วยเวลา
            $table->integer('spa_category_id');
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
        Schema::dropIfExists('spas');
    }
}
