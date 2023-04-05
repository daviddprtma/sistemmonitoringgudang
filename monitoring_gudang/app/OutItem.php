<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OutItem extends Model
{
    //
    protected $table = 'outitems';
    
    public function item(){
        return $this->belongsTo('App\Item','iditems');
    }

    public function unit(){
        return $this->belongsTo('App\Unit','idunits');
    }
}
