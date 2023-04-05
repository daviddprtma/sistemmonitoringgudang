<?php

namespace App\Http\Controllers;

use App\Category;
use Exception;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Category::all();
        return view('category.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('category.create');
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
        $data = new Category();

        $file = $request -> file('foto_barang');
        $imgFolder = 'images';
        $imgFile = time()."_".$file->getClientOriginalName();
        $file->move($imgFolder,$imgFile);
        $data->foto_barang = $imgFile;
        
        $data->nama_kategori = $request->get('nama_kategori');
        $data->deskripsi_barang = $request->get('deskripsi_barang');
        $data->save();
        return redirect()->route('categories.index')->with('status','Kategori Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
        // dd($category);
        $data = $category;
        return view('category.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
        $category->nama_kategori = $request->get('nama_kategori');
        $category->deskripsi_barang = $request->get('deskripsi_barang');
        $category->save();
        return redirect()->route('categories.index')->with('sunting','Kategori Berhasil Diupdate Yang Terbaru.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $this->authorize('delete-permission',$category);
        //
        try{
            $category->delete();
            return redirect()->route('categories.index')->with('delete','Data kategori berhasil dihapus');
        }
        catch(\PDOException $e){
            $msg = "Data kategori tidak dapat dihapus. Pastikan data kategori ini tidak terikat dengan data yang lain";
            return redirect()->route('categories.index')->with('error',$msg);
        }
    }

    public function changeFoto(Request $request){
        $id=$request->get("id");
        $category=Category::find($id);
        $file=$request->file('foto_barang');
        $imgFolder='images';
        $imgFile=time()."_".$file->getClientOriginalName();
        $file->move($imgFolder,$imgFile);
        $category->foto_barang = $imgFile;
        $category->save();
        return redirect()->route('categories.index')->with('sunting','Foto Barang berhasil diupdate');
    }    
}

