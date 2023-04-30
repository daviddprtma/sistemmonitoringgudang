<?php

namespace App\Http\Controllers;

use App\Category;
use App\Item;
use App\Unit;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Item::all();
        return view('item.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $cat = Category::all();
        $data = Item::all();
        $unit = Unit::all();
        return view('item.create',['cat'=>$cat,'data'=>$data,'unit'=>$unit]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Item $item)
    {
        //
        $this->authorize('add-permission',$item);
        $data = new Item();
        $file = $request ->file('gambar_stok');
        $imgFolder = 'images';
        $imgFile = time()."_".$file->getClientOriginalName();
        $file->move($imgFolder,$imgFile);
        $data->gambar_stok = $imgFile;
        $data->nama_barang = $request->get('nama_barang');
        $data->stok_barang = $request->get('stok_barang');
        $data->harga = $request->get('harga');
        $data->category_id = $request->get('category_id');
        $data->units_id = $request->get('units_id');
        $data->save();
        return redirect()->route('items.index')->with('status',"Stok barang:$data->nama_barang berhasil ditambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        //
        $data = $item;
        $cat = Category::all();
        $unit = Unit::all();
        return view('item.edit',compact('data','cat','unit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        //
        $this->authorize('edit-permission',$item);
        $item->nama_barang = $request->get('nama_barang');
        $item->stok_barang = $request->get('stok_barang');
        $item->harga = $request->get('harga');
        $item->category_id = $request->get('category_id');
        $item->units_id = $request->get('units_id');
        $item->save();
        return redirect()->route('items.index')->with('sunting',"Barang berhasil diupdate");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $this->authorize('delete-permission',$item);
        //
        try{
            $item->delete();
            return redirect()->route('items.index')->with('delete','Data barang berhasil dihapus');
        }
        catch(\PDOException $e){
            $msg = "Data barang tidak dapat dihapus. Pastikan data barang ini tidak terikat dengan data yang lain";
            return redirect()->route('items.index')->with('error',$msg);
        }
    }

    public function changeFotoBarang(Request $request){
        $id=$request->get("id");
        $item=Item::find($id);
        $file=$request->file('gambar_stok');
        $imgFolder='images';
        $imgFile=time()."_".$file->getClientOriginalName();
        $file->move($imgFolder,$imgFile);
        $item->gambar_stok = $imgFile;
        $item->save();
        return redirect()->route('items.index')->with('sunting','Foto Barang berhasil diupdate');
    }    
}
