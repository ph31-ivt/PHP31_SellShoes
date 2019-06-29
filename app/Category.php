<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Category extends Model
{
    protected $fillable=[
    	'name'
    ];

    protected $categories=[
    	'deleted_at'
    ];
    public function products(){
    	return $this->hasMany('App\Product');
    }

}
