<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDigitalpaychargeToOrderinternalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orderinternals', function (Blueprint $table) {
            $table->string('digital_pay_charge')->default('no')->after('delivery_charge');
            $table->string('digital_pay_charge_amount')->nullable()->after('digital_pay_charge');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orderinternals', function (Blueprint $table) {
            $table->dropColumn('digital_pay_charge');
            $table->dropColumn('digital_pay_charge_amount');
        });
    }
}
