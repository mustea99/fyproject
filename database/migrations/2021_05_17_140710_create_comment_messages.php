<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentMessages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment_messages', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('comment');
            $table->bigInteger('sender');
            $table->bigInteger('receiver');
            $table->string('sender_type');
            $table->string('message', 5000);
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
        Schema::dropIfExists('comment_messages');
    }
}
