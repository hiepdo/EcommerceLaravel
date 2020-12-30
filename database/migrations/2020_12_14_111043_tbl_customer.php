<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblCustomer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    protected $primaryKey = 'customer_id';

    public function up()
    {
        Schema::create('tbl_customers', function (Blueprint $table) {
            $table->Increments('customer_id');
            $table->string('customer_name');
            $table->string('customer_email');
            $table->string('customer_password');
            $table->string('customer_phone');
            $table->string('customer_verification_code')->nullable();
            $table->integer('customer_is_verified')->default(0);
            $table->string('customer_token')->nullable()->default(null);
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
        Schema::dropIfExists('tbl_customer');
    }
}
