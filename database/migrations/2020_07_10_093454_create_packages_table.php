<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->bigIncrements('pack_id');
            $table->string('pack_name');
            $table->string('pack_description');
            $table->string('pack_count');//จำนวนครั้งที่ใช้
            $table->string('pack_price',8,2);//ราคา
            $table->string('pack_time');//ระยะเวลา
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
        Schema::dropIfExists('packages');
    }
}
