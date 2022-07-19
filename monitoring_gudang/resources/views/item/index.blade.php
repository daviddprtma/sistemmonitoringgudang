@extends('layouts.admin')

@section('aside')
    <aside
        class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
        id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
                aria-hidden="true" id="iconSidenav"></i>
            {{-- <a class="navbar-brand m-0" href="/profile" target="_blank">
                <img src="{{ asset('uploads/' . Auth::user()->gambar) }}" class="navbar-brand-img h-100" alt="main_logo">
                <span class="ms-1 font-weight-bold text-white">{{ Auth::user()->name }}</span>
            </a> --}}
        </div>
        <hr class="horizontal light mt-0 mb-2">
        <div class="  w-auto " id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-white" href="/">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">dashboard</i>
                        </div>
                        <span class="nav-link-text ms-1">Dashboard</span>
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
                    <a class="nav-link text-white " href="/history">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">view_in_ar</i>
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
    <div class="container-fluid py-4">


        <div class="row mb-4">
            <div class="col-lg-12 col-md-12 mb-md-0 mb-4">
                <div class="card">
                    <div class="card-header pb-0">
                        @if (session()->has('success'))
                            <div class="alert alert-primary alert-dismissible fade show mt-1 d-flex justify-content-center"
                                role="alert">
                                {{ session('success') }}

                            </div>
                        @endif
                        <div class="row">
                            @if (session('status'))
                                <div class="alert alert-success d-flex justify-content-center text-light">
                                    {{ session('status') }}
                                </div>
                            @endif
                            @if (session('delete'))
                                <div class="alert alert-danger d-flex justify-content-center text-light">
                                    {{ session('delete') }}
                                </div>
                            @endif
                            <div class="col-lg-6 col-7">

                                <h6>Category</h6>
                                {{-- <p class="text-sm mb-0">
                                    <i class="fa fa-check text-info" aria-hidden="true"></i> Terdapat<span
                                        class="font-weight-bold ms-1">{{ count($cate) }} macam barang</span> pada saat
                                    ini
                                </p> --}}
                            </div>
                            <div class="col-lg-6 col-5 my-auto text-end">
                                <div class="dropdown float-lg-end pe-4">
                                    <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class="fa fa-ellipsis-v text-secondary"></i>
                                    </a>
                                    <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5" aria-labelledby="dropdownTable">
                                        <li><a class="dropdown-item border-radius-md" href="/catecreate">Tambah Category</a></li>
                                        <li><a class="dropdown-item border-radius-md" href="/report">Report</a></li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Id</th>

                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Nama Barang</th>

                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Harga Barang</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $d)
                                        {{-- {{ dd($m) }} --}}
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">

                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm mx-2">{{ $d->id }}.</h6>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="align-middle text-sm">
                                                <span class="text-xs font-weight-bold">{{ $d->nama_barang }}
                                                </span>
                                            </td>
                                            <td class="align-middle text-sm">
                                                <span class="text-xs font-weight-bold">{{ $d->harga_barang }}</span>
                                            </td>


                                            {{-- <td class="align-middle ">
                                                <div class="progress-wrapper d-flex justify-content-center mx-3">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <form action="/mg-category-edit/{{ $d->id }}">
                                                                <button type="submit" class="btn btn-primary"
                                                                    style="min-width: 80px;">
                                                                    {{ __('Edit') }}
                                                                </button>
                                                            </form>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <form action="/mg-category-delete/{{ $c->id }}">
                                                                @method('delete')
                                                                @csrf


                                                                <button type="submit" class="btn btn-danger"
                                                                    style="min-width: 80px;">
                                                                    {{ __('Delete') }}
                                                                </button>
                                                            </form>
                                                        </div>

                                                    </div>


                                                </div>
                                            </td>

 --}}

                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
