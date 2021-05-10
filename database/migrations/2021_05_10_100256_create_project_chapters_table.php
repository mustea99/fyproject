<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectChaptersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_chapters', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('student');
            $table->bigInteger('lecturer');
            $table->bigInteger('proposal');
            $table->string('title');
            $table->string('document');
            $table->string('chapter');
            $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('project_chapters');
    }
}
