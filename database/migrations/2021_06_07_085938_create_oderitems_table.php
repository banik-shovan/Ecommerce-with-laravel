<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOderitemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oderitems', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('orderinternal_id')->unsigned();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->integer('product_id');
            $table->string('qty');
            $table->string('name');
            $table->string('price');
            $table->string('size')->nullable();
            $table->string('volumename')->nullable();
            $table->string('totalprice');
            $table->string('image');
            $table->string('slug');
            $table->timestamps();
            $table->foreign('orderinternal_id')->references('id')->on('orderinternals')
                    ->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('oderitems');
    }
}
