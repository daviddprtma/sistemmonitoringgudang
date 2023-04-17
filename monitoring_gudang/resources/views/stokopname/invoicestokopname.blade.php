<div class="container-fluid py-4">
    <h2>Invoice Stok Opname {{$stokopname['nama_barang']}}</h2>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive">
                        <table class="table align-items-center mb-0" border="0.5">
                            <thead>
                                <tr>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Nama Barang</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Jumlah Barang
                                    </th>
                                </tr>
                            </thead>
                            <tbody>                                                               
                                        <tr>                                          
                                            <td class="align-middle text-sm">
                                                <span class="text-xs font-weight-bold">{{ $stokopname['item']['nama_barang'] }}
                                                </span>
                                            </td>

                                            <td class="align-middle text-sm">
                                                <span class="text-xs font-weight-bold" >{{ $stokopname['jumlah_barang'] }}
                                                </span>
                                            </td>
                                        </tr>                            
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

