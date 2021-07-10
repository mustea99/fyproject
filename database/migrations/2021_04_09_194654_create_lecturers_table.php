<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLecturersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lecturers', function (Blueprint $table) {
            $table->id();
            $table->string('First_name', 50);
            $table->string('Other_names', 50);
            $table->string('Email', 150)->unique();
            $table->string('Avatar', 150)->nullable();
            $table->string('Staff_id',50)->nullable()->unique();
            $table->string('Department',100);
            $table->string('Phone_No')->unique();
            $table->string('Office')->unique();
            $table->string('Password', 150);
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
        Schema::dropIfExists('lecturers');
    }
}
