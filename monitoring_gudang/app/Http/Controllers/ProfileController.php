<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Profile::all();
        return view('profile.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        //
        $data = $profile;
        return view('profile.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        //
        $id=$request->get("id");
        $profile=Profile::find($id);
        $file=$request->file('foto');
        $imgFolder='images';
        $imgFile=time()."_".$file->getClientOriginalName();
        $file->move($imgFolder,$imgFile);
        $profile->foto = $imgFile;
        $profile->nama_perusahaan = $request->get('nama_perusahaan');
        $profile->lokasi = $request->get('lokasi');
        $profile->alamat = $request->get('alamat');
        $profile->jam_operasi = $request->get('jam_operasi');
        $profile->telepon = $request->get('telepon');
        $profile->save();
        return redirect()->route('profiles.index')->with('sunting','Profil berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
