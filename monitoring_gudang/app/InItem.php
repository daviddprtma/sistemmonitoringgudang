<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class InItem extends Model
{
    //
    protected $table = 'initems';

    public function getCreatedAtAtribute(){
        return Carbon::parse($this->attributes['tanggalMasuk'])->translatedFormat('l, d F Y');
    }

    public function unit(){
        return $this->belongsTo('App\Unit','idunits');
    }

    public function item(){
        return $this->belongsTo('App\Item','iditems');
    }
}
