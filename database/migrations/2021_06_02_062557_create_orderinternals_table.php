<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderinternalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orderinternals', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable()->unsigned();
            $table->string('order_unique_id');
            $table->string('payment_type');
            $table->string('status');
            $table->double('total_amount_before_cupon_point');
            $table->double('total_amount');
            $table->string('trems_policy')->default('yes');
            $table->string('shipping_address');
            $table->string('country');
            $table->string('city');
            $table->string('zip');
            $table->string('phone');
            $table->string('email');
            $table->string('point')->default('not_apply');
            $table->string('coupon');
            $table->integer('coupon_price');
            $table->string('delivery_option');
            $table->string('delivery_charge');
            $table->string('transaction_id')->nullable();
            $table->timestamps();
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
        Schema::dropIfExists('orderinternals');
    }
}
