<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //
    public function category(){
        return $this->belongsTo('App\Category','category_id');
    }

    public function unit(){
        return $this->belongsTo('App\Unit','units_id');
    }

    public function outItem(){
        return $this->hasMany('App\Outitem','outitems_id','id');
    }

    public function inItem(){
        return $this->belongsTo('App\Initem','idinitems');
    }

}
