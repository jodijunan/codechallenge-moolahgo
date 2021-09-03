<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTabelInvUom extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabel_inv_uom', function (Blueprint $table) {
            $table->id();
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
        Schema::dropIfExists('tabel_inv_uom');
    }
}
