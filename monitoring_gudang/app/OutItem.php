<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OutItem extends Model
{
    //
    protected $table = 'outitems';
    protected $fillable = ['tanggal_keluar','stok_barang', 'nama_perusahaan','jumlah_barang_dibeli','iditems','idunits'];
    public function item(){
        return $this->belongsTo('App\Item','iditems');
    }

    public function unit(){
        return $this->belongsTo('App\Unit','idunits');
    }
}
