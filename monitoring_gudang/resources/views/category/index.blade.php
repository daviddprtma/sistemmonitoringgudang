@extends('layouts.admin')

@section('aside')
    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
        id="sidenav-main">
        <hr class="horizontal light mt-0 mb-2">
        <div class="  w-auto " id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-white" href="/dashboard">
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
                    <a class="nav-link text-white " href="{{url('categories')}}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons opacity-10">format_textdirection_r_to_l</i>
                    </div>
                    <span class="nav-link-text ms-1">Kategori Barang</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white " href="{{url('items')}}">
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
    <div class="container-fluid py-4">
        <h6>Kategori Barang</h6>
        <div class="row mb-4">
            <div class="col-lg-12 col-md-12 mb-md-0 mb-4">
                <div class="card">
                    <div class="card-header pb-0">
                        @if (session()->has('error'))
                            <div class="alert alert-primary alert-dismissible fade show mt-1 d-flex justify-content-center"
                                role="alert">
                                {{ session('error') }}
                            </div>
                        @endif
                        <div class="row">
                            @if (session('status'))
                                <div class="alert alert-success d-flex justify-content-center text-light">
                                    {{ session('status') }}
                                </div>
                            @endif

                            @if (session('sunting'))
                            <div class="alert alert-warning d-flex justify-content-center text-light">
                                {{ session('sunting') }}
                            </div>
                            @endif
                            @if (session('delete'))
                                <div class="alert alert-danger d-flex justify-content-center text-light">
                                    {{ session('delete') }}
                                </div>
                            @endif

                            <div>
                                @can('add-permission')
                                <a href="{{url('categories/create')}}" class="btn bg-gradient-info" type="button" data-target="infoToast">
                                    Tambah Kategori
                                </a>
                                @endcan
                            </div>
                        </div>
                    </div>

                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="category">
                                <thead>
                                    <tr>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Gambar</th>

                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Nama Kategori</th>

                                        <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Deskripsi Kategori</th>

                                        @can('aksi')
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Aksi</th>
                                        @endcan
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $d)
                                        {{-- {{ dd($m) }} --}}
                                        <tr>

                                            <td>

                                                <img src="{{asset('images/'.$d->foto_barang)}}" height="90px">

                                                <a href="#modalChange_{{$d->id}}" data-toggle="modal" class="btn btn-xs btn-default" style="background:turquoise">
                                                    Ubah Gambar</a>
                                                <div class="modal fade" id="modalChange_{{$d->id}}" tabindex="-1" role="basic" aria-hidden="true">

                                                  <div class="modal-dialog">
                                                    <div class="modal-content" >
                                                      <form method="POST" enctype="multipart/form-data" action="{{route('categories.changeFoto')}}" role="form"  >
                                                      <div class="modal-header">
                                                        <button type="button" class="close"
                                                          data-dismiss="modal" aria-hidden="true"></button>
                                                        <h4 class="modal-title">Ubah Gambar untuk {{$d->nama_kategori}}</h4>
                                                      </div>

                                                      <div class="modal-body">
                                                          @csrf
                                                          <div class="form-body">
                                                              <div class="form-group">
                                                                  <label for="exampleInputEmail1">Foto Barang</label>
                                                                  <input type="file" class="form-control" id="foto_barang" name="foto_barang">
                                                                  <input type="hidden" id="id" name="id" value="{{$d->id}}">
                                                              </div>
                                                          </div>

                                                      </div>

                                                      <div class="modal-footer">
                                                        <button type="submit" class="btn btn-warning">Unggah Foto Baru</button>
                                                        <a data-dismiss="modal" class="btn btn-default">Batal</a>
                                                      </div>
                                                      </form>
                                                    </div>
                                                  </div>
                                                </div>
                                          </td>


                                            <td class="align-middle text-sm">
                                                <span class="text-xs font-weight-bold">{{ $d->nama_kategori }}
                                                </span>
                                            </td>
                                            <td class="align-middle text-sm">
                                                <span class="text-xs font-weight-bold">{{ $d->deskripsi_barang }}</span>
                                            </td>


                                            @can('aksi', $d)
                                            <td class="align-middle ">
                                                <div class="ms-auto text-end">
                                                    @can('edit-permission',$d)
                                                    <a href="{{url('categories/'.$d->id.'/edit')}}" class="btn btn-link text-dark px-3 mb-0">
                                                        <i class="material-icons text-sm me-2">edit</i>Edit</a>
                                                    @endcan
                                                        @can('delete-permission', $d)

                                                        <form method="POST" action="{{url('categories/'.$d->id)}}">
                                                            @csrf
                                                            @method("DELETE")
                                                            <input type="submit" value="delete" class="btn btn-link text-danger text-gradient px-3 mb-0"
                                                            onclick="if(!confirm('apakah anda yakin untuk menghapus data kategori ini?')) return false;">

                                                        </form>

                                                        @endcan
                                                </div>
                                            </td>
                                            @endcan
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
