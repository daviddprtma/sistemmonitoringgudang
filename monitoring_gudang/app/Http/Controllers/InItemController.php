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
        $item = Item::all();
        return view('initem.index',['initem'=>$initem, 'item'=>$item]);
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
        $item = Item::all();
        $unit = Unit::all();
        return view('initem.create',['data'=>$data,'unit'=>$unit,'item'=>$item]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, InItem $initem)
    {
        //
        $this->authorize('add-permission',$initem);
        $barang = Item::find($request->iditems);
        
        InItem::create([
                'tanggal_masuk'=>$request->tanggal_masuk,
                'iditems'=>$request->iditems,
                'jumlah_barang_masuk'=>$request->jumlah_barang_masuk,
                'harga_barang_masuk'=>$request->harga_barang_masuk,
                'idunits'=>$request->idunits
        ]);
        
        $barang->stok_barang += $request->jumlah_barang_masuk;
        $barang->save();
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
        $item = Item::all();
        return view('initem.edit',['data'=>$data, 'unit'=>$unit, 'item'=>$item]);
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
        $this->authorize('edit-permission',$initem);
        $initem->tanggal_masuk = $request->get('tanggal_masuk');
        $initem->jumlah_barang_masuk = $request->get('jumlah_barang_masuk');
        $initem->idunits = $request->get('idunits');
        $initem->iditems = $request->get('iditems');
        $initem->harga_barang_masuk = $request->get('harga_barang_masuk');
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
