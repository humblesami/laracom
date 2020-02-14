<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;
use App\Country;
use App\State;
use App\City;
class Profile extends Model
{
    //
    use SoftDeletes;
    protected $guarded = [];
    protected $dates = ['deleted_at'];

    public function users(){
        return $this->hasOne('App\User');
    }
    public function getRouteKeyName(){
        return 'slug';
    }
    public function country(){
        return $this->belongsTo('App\Country');
    }
    public function state(){
        return $this->belongsTo('App\State');
    }
    public function city(){
        return $this->belongsTo('App\City');
    }
}
