<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductSize extends Model
{
	protected $table ="product_sizes";
    protected $fillable=[
    	'quantity','product_id','size_id'
    ];

    
}
