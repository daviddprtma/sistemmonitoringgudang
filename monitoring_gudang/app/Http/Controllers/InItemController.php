<?php

namespace App\Http\Controllers;

use App\InItem;
use App\Item;
use App\Unit;
use Illuminate\Http\Request;

class InItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $initem = InItem::all();
        return view('initem.index',['initem'=>$initem]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data = InItem::all();
        $unit = Unit::all();
        return view('initem.create',['data'=>$data,'unit'=>$unit]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = new InItem();
        $data->tanggal_masuk = $request->get('tanggal_masuk');
        $data->nama_barang_masuk = $request->get('nama_barang_masuk');
        $data->jumlah_barang_masuk = $request->get('jumlah_barang_masuk');
        $data->idunits = $request->get('idunits');
        $data->harga_barang_masuk = $request->get('harga_barang_masuk');
        $data->save();
        return redirect()->route('initems.index')->with('status','Barang Masuk berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(InItem $initem)
    {
        //
        $data = $initem;
        $unit = Unit::all();
        return view('initem.edit',['data'=>$data, 'unit'=>$unit]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InItem $initem)
    {
        //
        $initem->tanggal_masuk = $request->get('tanggal_masuk');
        $initem->nama_barang_masuk = $request->get('nama_barang_masuk');
        $initem->jumlah_barang_masuk = $request->get('jumlah_barang_masuk');
        $initem->idunits = $request->get('idunits');
        $initem->save();
        return redirect()->route('initems.index')->with('sunting','Pencatatan stok masuk telah diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $this->authorize('delete-permission',$id);
        //
        try{
            $res = InItem::find($id);
            $res->delete();
            return redirect()->route('initems.index')->with('delete','Pencatatan Stok Masuk berhasil dihapus');
        }
        catch(\PDOException $e){
            $msg = "Pencatatan Stok Masuk tidak dapat dihapus.";
            return redirect()->route('initems.index')->with('error',$msg);
        }
    }
}
