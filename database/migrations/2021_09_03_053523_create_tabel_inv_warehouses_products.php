<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTabelInvWarehousesProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabel_inv_warehouses_products', function (Blueprint $table) {
            $table->id();
            $table->integer('warehouse_id');
            $table->integer('product_id');
            $table->decimal('quantity');
            $table->dateTime('date_created');
            $table->dateTime('date_modified');
            $table->enum('discontinue', array('0', '1'));	
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tabel_inv_warehouses_products');
    }
}
