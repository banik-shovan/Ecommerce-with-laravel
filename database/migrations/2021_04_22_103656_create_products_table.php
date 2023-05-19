<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->bigInteger('menu_id')->unsigned();
            $table->bigInteger('submenu_id')->unsigned()->nullable();
            $table->bigInteger('brand_id')->unsigned()->nullable();
            $table->string('image1');
            $table->string('image2')->nullable();
            $table->string('image3')->nullable();
            $table->string('image4')->nullable();
            $table->longText('short_description')->nullable();
            $table->longText('description')->nullable();
            $table->string('exclusive');
            $table->string('main_price')->nullable();
            $table->string('old_price')->nullable();
            $table->string('size');
            $table->string('volume');
            $table->integer('s')->nullable();
            $table->integer('m')->nullable();
            $table->integer('l')->nullable();
            $table->integer('xl')->nullable();
            $table->integer('xxl')->nullable();
            $table->integer('total');
            $table->timestamps();
            $table->foreign('menu_id')->references('id')->on('menus')
                  ->onDelete('cascade');
            $table->foreign('submenu_id')->references('id')->on('submenus')
                  ->onDelete('cascade');
            $table->foreign('brand_id')->references('id')->on('brands');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
