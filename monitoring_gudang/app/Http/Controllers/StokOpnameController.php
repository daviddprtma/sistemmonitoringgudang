<?php

namespace App\Http\Controllers;

use App\Item;
use App\StokOpname;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class StokOpnameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $stokOpname = StokOpname::all();
        return view('stokopname.index',['stokopname'=>$stokOpname]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data = StokOpname::all();
        $item = Item::all();
        return view('stokopname.create',['data'=>$data,'item'=> $item]);
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
        $data = new StokOpname();
        $data->iditems = $request->get('iditems');
        $data->jumlah_barang = $request->get('jumlah_barang');
        $data->save();
        return redirect()->route('stokopnames.index')->with('status','Stok opname berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\StokOpname  $stokOpname
     * @return \Illuminate\Http\Response
     */
    public function show(StokOpname $stokOpname)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StokOpname  $stokOpname
     * @return \Illuminate\Http\Response
     */
    public function edit(StokOpname $stokopname)
    {
        //
        $data = $stokopname;
        $item = Item::all();
        return view('stokopname.edit',compact('data','item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StokOpname  $stokOpname
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StokOpname $stokopname)
    {
        //
        $stokopname->iditems = $request->get('iditems');
        $stokopname->jumlah_barang = $request->get('jumlah_barang');
        $stokopname->save();
        return redirect()->route('stokopnames.index')->with('sunting','Stok Opname berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StokOpname  $stokOpname
     * @return \Illuminate\Http\Response
     */
    public function destroy(StokOpname $stokopname)
    {
        //
        $this->authorize('delete-permission',$stokopname);
        //
        try{
            $stokopname->delete();
            return redirect()->route('stokopnames.index')->with('delete','Data Stok Opname berhasil dihapus');
        }
        catch(\PDOException $e){
            $msg = "Data Stok Opname tidak dapat dihapus. Pastikan data stok opname ini tidak terikat dengan data yang lain";
            return redirect()->route('stokopnames.index')->with('error',$msg);
        }
    }

    public function invoicePdfStokOpname($id){
        $stokopname = StokOpname::find($id);
        $pdf = PDF::loadview('stokopname.invoicestokopname',['stokopname'=>$stokopname])->setOption(['defaultFont'=>'sans-serif']);
        $name = "laporanstokopname".$stokopname["created_at"].".pdf";
        return $pdf->download($name);
    }
}
