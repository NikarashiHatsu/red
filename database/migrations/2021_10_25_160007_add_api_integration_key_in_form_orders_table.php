<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddApiIntegrationKeyInFormOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('form_orders', function (Blueprint $table) {
            $table->string('api_merchant_code')->after('twitter_url')->nullable();
            $table->string('api_integration_key')->after('api_merchant_code')->nullable();
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
            $table->dropColumn('api_merchant_code');
            $table->dropColumn('api_integration_key');
        });
    }
}
