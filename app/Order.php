<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable=[
    	'tel','address','name','email','status'
    ];

    public function products(){
    	return $this->belongsToMany('App\Product','order__products','order_id','product_id')->withPivot('quantity','price')->withTimestamps();
    }
}
