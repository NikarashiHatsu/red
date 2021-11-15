<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveUserIdForeignKeyFromProductViews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_views', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropIndex('product_views_user_id_foreign');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_views', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
    }
}
