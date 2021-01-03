<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
   public $Timestamps=false;
   protected $fillable=[
       'customer_email','customer_password','customer_name','customer_phone'
   ];
   protected $primaryKey='customer_id';
   protected $table ='tbl_customers';
}
