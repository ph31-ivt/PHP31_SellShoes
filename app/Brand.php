<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SolfDeletes;

class Brand extends Model
{
    protected $fillable=[
    	'name','description'
    ];

    protected $brands=[
    	"deleted_at"
    ];
    public function products(){
    	return $this->hasMany('App\Product');
    }
}
