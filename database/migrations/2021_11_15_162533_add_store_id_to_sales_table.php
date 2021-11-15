<?php

use App\Models\Sale;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddStoreIdToSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $sales = Sale::all();

        DB::table('sales')->truncate();

        Schema::table('sales', function (Blueprint $table) {
            $table->foreignId('store_id')->after('product_id')->nullable()->constrained('form_orders');
        });

        $sales->each(function($sale) {
            $sale->store_id = $sale->product->form_order->id;

            Sale::create(collect($sale)->toArray());
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sales', function (Blueprint $table) {
            $table->dropConstrainedForeignId('store_id');
        });
    }
}
