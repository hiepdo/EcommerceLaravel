<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblStatistical extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    protected $primaryKey='id_statistical';
    public function up()
    {
        Schema::create('tbl_statistical', function (Blueprint $table) {
            $table->Increments('id_statistical');
            $table->string('order_date');
            $table->string('sales');
            $table->string('profit');
            $table->integer('quantity');
            $table->integer('total_order');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_statistical');
    }
}
