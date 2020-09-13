<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('emp_id');
            $table->string('emp_prefix');//คำนำหน้าชื่อ
            $table->string('emp_firstname');
            $table->string('emp_lastname');
            $table->string('emp_email')->unique();
            $table->string('emp_gender'); //เพศ
            $table->date('emp_bdate');//วันเกิด
            $table->integer('emp_position');//ตำแหน่งพนักงาน
            $table->integer('emp_id_card')->unique();//รหัสประชาชน
            $table->string('emp_nationality');//สัญชาติ
            $table->string('emp_religion');//ศาสนา
            $table->string('emp_address');//ที่อยู่
            $table->string('emp_province');//จังหวัด
            $table->string('emp_amphur');//อำเภอ เขต
            $table->string('emp_district');//ตำบล แขวง
            $table->string('emp_username');
            $table->string('emp_password');
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
        Schema::dropIfExists('employees');
    }
}
