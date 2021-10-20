<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsRequestAcceptedColumnInFormOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('form_orders', function (Blueprint $table) {
            $table->boolean('is_request_accepted')->after('is_requested')->nullable();
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
            $table->dropColumn('is_request_accepted');
        });
    }
}
