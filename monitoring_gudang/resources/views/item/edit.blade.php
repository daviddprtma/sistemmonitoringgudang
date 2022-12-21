@extends('layouts.admin')

@section('aside')
    <aside
        class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
        id="sidenav-main">
        <div class="sidenav-header">
            {{-- <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
                aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href="/profile" target="_blank">
                <img src="{{ asset('uploads/' . Auth::user()->gambar) }}" class="navbar-brand-img h-100" alt="main_logo">
                <span class="ms-1 font-weight-bold text-white">{{ Auth::user()->name }}</span>
            </a> --}}
        </div>
        <hr class="horizontal light mt-0 mb-2">
        <div class="  w-auto " id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-white" href="/admin">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">dashboard</i>
                        </div>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white" href="">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">person</i>
                        </div>
                        <span class="nav-link-text ms-1">Profil</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white " href="{{url('category')}}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons opacity-10">format_textdirection_r_to_l</i>
                    </div>
                    <span class="nav-link-text ms-1">Kategori Barang</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white " href="{{url('item')}}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">table_view</i>
                        </div>
                        <span class="nav-link-text ms-1">Stok barang</span>
                    </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link text-white " href="">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">view_in_ar</i>
                        </div>
                        <span class="nav-link-text ms-1">Pencatatan Stok</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white " href="">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">receipt_long</i>
                        </div>
                        <span class="nav-link-text ms-1">Transaksi</span>
                    </a>
                </li>

            </ul>
        </div>
        <div class="sidenav-footer position-absolute  bottom-0 ">
            <div class="mx-3">
                <form id="logout-form" action="/logout" method="post">
                    @csrf


                    <a class="btn bg-gradient-primary mt-4 " href="" style=""> <svg
                            xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                            class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z" />
                            <path fill-rule="evenodd"
                                d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z" />
                        </svg>
                        <button type="submit" aria-current="page"
                            style="border: none; background-color: transparent; font-size: 15px; color: white;">
                            LOGOUT
                        </button></a>
                </form>

            </div>
        </div>
    </aside>
@endsection

@section('content')
    <div class="container-fluid px-2 px-md-4">
        <div class="page-header min-height-100 border-radius-xl mt-4"
            style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
            <span class="mask  bg-gradient-primary  opacity-6"></span>
        </div>

        <div class="card card-body mx-3 mx-md-4 mt-n6 ">
            <form method="POST" action="{{ url('items/'.$data->id) }}" enctype="multipart/form-data">
                @csrf
                @method("PUT")
                <div class="row">
                    <div class="col-md12 px-1">
                        <div class="form-group">
                                <label>Nama Barang</label>
                                <input type="text" class="form-control" name="nama_barang" placeholder="Nama Barang"
                                    value="{{$data->nama_barang}}">
                        </div>
                    </div>
                </div>

                    <div class="row">

                        <div class="col-md-12 px-1">
                            <div class="form-group">
                                <label>Jumlah Stok</label>
                                <input type="number" class="form-control" name="stok_barang" placeholder="Jumlah Stok" min="0" value="{{$data->stok_barang}}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 px-1">
                        <label for="exampleInputEmail1">Kategori Barang</label>
                        <select name="category_id" class="form-control">
                            @foreach ($cat as $c)
                                <option value="{{$c->id}}">{{$c->nama_kategori}}</option>
                            @endforeach
                        </select>
                    </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 px-1">
                        <label for="exampleInputEmail1">Satuan</label>
                        <select name="units_id" class="form-control">
                            @foreach ($unit as $u)
                                <option value="{{$u->id}}">{{$u->satuan}}</option>
                            @endforeach
                        </select>
                    </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="update ml-auto mr-auto">
                            <button type="submit" class="btn btn-primary btn-round">Update Kategori</button>
                                <a href="{{url('items')}}" class="btn btn-warning" type="button">
                                    Kembali</a>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection
