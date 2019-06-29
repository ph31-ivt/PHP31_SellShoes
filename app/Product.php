<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    protected $fillable=[
    	'name','status','price','brand_id','category_id','size_id','description'
    ];

    protected $products =[
    	'deleted_at'
    ];

    public function promotion(){
    	return $this->hasOne('App\Promotion');
    }

    public function sizes(){
    	return $this->belongsToMany('App\Size','product_sizes','product_id','size_id')->withPivot('quantity')->withTimestamps();
    }
    public function category(){
    	return $this->belongsTo('App\Category');
    }
    public function brand(){
    	return $this->belongsTo('App\Brand');
    }
}
