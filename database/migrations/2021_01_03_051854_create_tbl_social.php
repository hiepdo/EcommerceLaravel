<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSocial extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     * 
     */
    protected $primaryKey='user_id';
    public function up()
    {
        Schema::create('tbl_social', function (Blueprint $table) {
            $table->Increments('user_id');
            $table->string('provider_user_id');
            $table->string('provider');
            $table->integer('user')->default(0);
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
        Schema::dropIfExists('tbl_social');
    }
}
