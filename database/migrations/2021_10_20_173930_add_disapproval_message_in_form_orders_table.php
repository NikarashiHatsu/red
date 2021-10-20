<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDisapprovalMessageInFormOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('form_orders', function (Blueprint $table) {
            $table->string('disapproval_message')->after('is_request_accepted')->nullable();
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
            $table->dropColumn('disapproval_message');
        });
    }
}
