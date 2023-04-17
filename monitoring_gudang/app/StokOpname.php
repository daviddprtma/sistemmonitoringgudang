<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StokOpname extends Model
{
    //
    protected $table = 'opnames';

    public function item(){
        return $this->belongsTo('App\Item','iditems');
    }
}
