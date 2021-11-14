<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoreViewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_views', function (Blueprint $table) {
            $table->id();
            $table->foreignId('form_order_id')->comment('Store ID')->constrained();
            $table->foreignId('user_id')->comment('ID of User whose viewed the store')->constrained();
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
        Schema::dropIfExists('store_views');
    }
}
