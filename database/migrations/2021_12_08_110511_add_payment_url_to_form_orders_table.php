<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPaymentUrlToFormOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('form_orders', function (Blueprint $table) {
            $table->string('payment_url')->nullable()->after('sid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('form_orders', function (Blueprint $table) {
            $table->dropColumn('payment_url');
        });
    }
}
