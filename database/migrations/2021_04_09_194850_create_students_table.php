<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('First_name',100);
            $table->string('Other_names',100);
            $table->string('RegNo',100);
            $table->string('Email',100);
            $table->string('Phone_No');
            $table->string('Department',100);
            $table->string('Gender',100);
            $table->integer('Supervisor_id')->nullable();
            $table->string('Password',100);
            $table->integer('code')->nullable();
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
        Schema::dropIfExists('students');
    }
}
