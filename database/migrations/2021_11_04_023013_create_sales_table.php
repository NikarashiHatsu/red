<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('product_id')->constrained();
            $table->integer('quantity')->nullable();
            $table->text('address')->nullable();
            $table->integer('phone_number')->nullable();
            $table->boolean('is_paid')->nullable();
            $table->boolean('is_product_sent')->nullable();
            $table->boolean('is_product_received')->nullable();
            $table->string('reference')->nullable();
            $table->string('merchant_order_id')->nullable();
            $table->string('result_code')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
}
