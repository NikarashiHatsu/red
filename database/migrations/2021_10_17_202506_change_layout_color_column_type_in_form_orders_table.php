<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeLayoutColorColumnTypeInFormOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('form_orders', function (Blueprint $table) {
            $table->string('layout_color')->nullable()->change();
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
            $table->integer('layout_color')->nullable()->change();
        });
    }
}
