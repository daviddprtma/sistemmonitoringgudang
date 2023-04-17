<?php
namespace App\Http\Controllers;
use App\Item;
use App\OutItem;
use App\Unit;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Http\Request;

class OutItemController extends Controller
{
    //
    public function index(){
        $data = OutItem::all();
        return view('outitem.index',['data'=>$data]);
    }

    public function create(){
        $data = OutItem::all();
        $item = Item::all();
        $unit = Unit::all();
        return view('outitem.create',['data'=>$data, 'item'=>$item, 'unit'=>$unit]);
    }

    public function store (Request $request){
        $data = new OutItem();
        $data->iditems = $request->get('iditems');
        $data->nama_perusahaan = $request->get('nama_perusahaan');
        $data->idunits = $request->get('idunits');
        $data->jumlah_barang_dibeli = $request->get('jumlah_barang_dibeli');
        $data->save();
        return redirect()->route('outitems.index')->with('status','Sukses menambah barang');
    }

    public function edit(OutItem $outitem){
        $data = $outitem;
        $item = Item::all();
        $unit = Unit::all();
        return view('outitem.edit',compact('data','item','unit'));
    }

    public function update(Request $request, OutItem $outitem){
        $outitem-> iditems = $request->get('iditems');
        $outitem->nama_perusahaan = $request->get('nama_perusahaan');
        $outitem->idunits = $request->get('idunits');
        $outitem->jumlah_barang_dibeli = $request->get('jumlah_barang_dibeli');
        $outitem->save();
        return redirect()->route('outitems.index')->with('sunting','Pencatatan stok keluar telah diupdate');
    }

    public function destroy($id)
    {
        $this->authorize('delete-permission',$id);
        //
        try{
            $res = OutItem::find($id);
            $res->delete();
            return redirect()->route('outitems.index')->with('delete','1 item telah dihapus');
        }
        catch(\PDOException $e){
            $msg = "Pencatatan Stok Keluar tidak dapat dihapus.";
            return redirect()->route('outitems.index')->with('error',$msg);
        }
    }

    public function invoicePdf($id){
        $outitem = OutItem::find($id);
        $pdf = PDF::loadview('outitem.invoice',['outitem'=>$outitem])->setOption(['defaultFont'=>'sans-serif']);
        $name = "laporan-stok-keluar".$outitem["nama_perusahaan"].$outitem["created_at"].".pdf";
        return $pdf->download($name);
    }
}