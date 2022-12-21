<?php

namespace App\Http\Controllers;

use App\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Unit::all();
        
        return view('units.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data = Unit::all();
        return view('units.create',['data'=>$data]);
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
        $data = new Unit();
        $data->satuan = $request->get('satuan');
        $data->save();
        return redirect()->route('units.index')->with('status',"Satuan :.$data->satuan. berhasil ditambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function show(Unit $unit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function edit(Unit $unit)
    {
        //
        $data = $unit;
        return view('units.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Unit $unit)
    {
        //
        $unit->satuan = $request->get('satuan');
        $unit->save();
        return redirect()->route('units.index')->with('sunting',"Satuan berhasil diupdate");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unit $unit)
    {
        //
        try{
            $unit->delete();
            return redirect()->route('units.index')->with('delete','Data Satuan berhasil dihapus');
        }
        catch(\PDOException $e){
            $msg = "Data Satuan tidak dapat dihapus. Pastikan data satuan ini tidak terikat dengan data yang lain";
            return redirect()->route('units.index')->with('error',$msg);
        }
    }
}
