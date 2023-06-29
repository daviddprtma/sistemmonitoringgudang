<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    //
    public function item(){
        return $this->belongsTo('App\Item','iditems');
    }
    public function unit(){
        return $this->belongsTo('App\Unit','idunits');
    }
}
