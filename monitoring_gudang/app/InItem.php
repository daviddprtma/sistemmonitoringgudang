<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class InItem extends Model
{
    //
    protected $table = 'initems';
    protected $fillable = ['tanggal_masuk','iditems','jumlah_barang_masuk','harga_barang_masuk','idunits'];

    public function getCreatedAtAtribute(){
        return Carbon::parse($this->attributes['tanggal_masuk'])->translatedFormat('l, d F Y');
    }

    public function unit(){
        return $this->belongsTo('App\Unit','idunits');
    }

    public function item(){
        return $this->belongsTo('App\Item','iditems');
    }
    
}
