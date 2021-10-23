<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDuitkuTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('duitku_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('form_order_id')->constrained();
            $table->string('reference')->nullable();
            $table->string('merchant_code')->nullable();
            $table->string('merchant_order_id')->nullable();
            $table->string('merchant_user_id')->nullable();
            $table->string('amount')->nullable();
            $table->string('product_detail')->nullable();
            $table->string('additional_param')->nullable();
            $table->string('result_code')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('signature')->nullable();
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
        Schema::dropIfExists('duitku_transactions');
    }
}
