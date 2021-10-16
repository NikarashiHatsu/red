<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('pricing_plan_id')->nullable()->constrained();
            $table->string('store_banner_path')->nullable();
            $table->string('store_logo_path')->nullable();
            $table->string('store_owner')->nullable();
            $table->string('store_name')->nullable();
            $table->string('application_name')->nullable();
            $table->text('application_description')->nullable();
            $table->text('store_address')->nullable();
            $table->string('store_url')->nullable();
            $table->integer('whatsapp_number')->nullable();
            $table->string('youtube_url')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('twitter_url')->nullable();
            $table->integer('layout_id')->nullable();
            $table->integer('layout_color')->nullable();
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
        Schema::dropIfExists('form_orders');
    }
}
