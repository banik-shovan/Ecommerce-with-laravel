<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogcommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogcomments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger ('blog_id');
            $table->unsignedBigInteger ('user_id');
            $table->string('name');
            $table->string('email');
            $table->integer('phone');
            $table->text ('comment');
            $table->foreign('blog_id')
                  ->references('id')->on ('blogs')
                  ->onDelete('cascade');
            $table->foreign('user_id')
                  ->references('id')->on ('users')
                  ->onDelete('cascade');
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
        Schema::dropIfExists('blogcomments');
    }
}
