<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    //
    use SoftDeletes;
    protected $guarded = [];
    protected $dates = ['deleted_at'];
    public function customer(){
    	return $this->belongsTo('App\Customer','user_id');
    }
    public function product(){
    	return $this->belongsTo('App\Product','product_id');
    }
}
