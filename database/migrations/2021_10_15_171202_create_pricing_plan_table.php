<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePricingPlanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pricing_plan', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->boolean('has_app');
            $table->boolean('has_released_on_google_play');
            $table->integer('number_of_products');
            $table->boolean('has_blog');
            $table->boolean('has_hosting_and_domain');
            $table->boolean('has_self_manage');
            $table->boolean('has_online_payment');
            $table->boolean('has_whatsapp_integration');
            $table->boolean('has_sale_transaction');
            $table->boolean('has_aposerba_integration');
            $table->boolean('has_ad_mob_integration');
            $table->integer('price');
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
        Schema::dropIfExists('pricing_plan');
    }
}
