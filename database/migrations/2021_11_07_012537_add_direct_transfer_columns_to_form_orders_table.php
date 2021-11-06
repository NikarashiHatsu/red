<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDirectTransferColumnsToFormOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('form_orders', function (Blueprint $table) {
            $table->string('direct_transfer_bank')->after('sid')->nullable();
            $table->string('direct_transfer_to')->after('direct_transfer_bank')->nullable();
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
            $table->dropColumn('direct_transfer_bank');
            $table->dropColumn('direct_transfer_to');
        });
    }
}
