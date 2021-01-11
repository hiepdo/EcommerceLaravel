<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'customers_id', 'product_id'
    ];
    protected $primaryKey = 'wishlist_id';
    protected $table = 'tbl_wishlist';
     
}
