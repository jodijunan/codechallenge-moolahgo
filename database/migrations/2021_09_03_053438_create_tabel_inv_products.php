<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTabelInvProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabel_inv_products', function (Blueprint $table) {
            $table->id();
            $table->string('code',100);
            $table->string('name',100);
            $table->integer('category');
            $table->decimal('cost');
            $table->decimal('price');
            $table->decimal('quantity');
            $table->integer('uom');
            $table->text('description');
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
        Schema::dropIfExists('tabel_inv_products');
    }
}
