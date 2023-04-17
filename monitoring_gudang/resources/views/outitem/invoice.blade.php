<div class="container-fluid py-4">
        <h2>Invoice Stok Keluar {{$outitem['item']['nama_barang']}}</h2>
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
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Satuan Barang
                                        </th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Harga Barang
                                        </th>
                                        <th
                                            class="text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Nama Perusahaan
                                        </th>
                                        <th
                                            class="text-center text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Total Harga
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>                                                               
                                            <tr>                                          
                                                <td class="align-middle text-sm">
                                                    <span class="text-xs font-weight-bold">{{ $outitem['item']['nama_barang'] }}
                                                    </span>
                                                </td>

                                                <td class="align-middle text-sm">
                                                    <span class="text-xs font-weight-bold" >{{ $outitem['jumlah_barang_dibeli'] }}
                                                    </span>
                                                </td>

                                                <td class="align-middle text-sm">
                                                    <span class="text-xs font-weight-bold">{{ $outitem['unit']['satuan'] }}
                                                    </span>
                                                </td>

                                                <td class="align-middle text-sm">
                                                    @currency($outitem['item']['harga'])
                                                </td>
                                                
                                                <td class="align-middle text-sm">
                                                    <span class="text-xs font-weight-bold">{{ $outitem['nama_perusahaan'] }}
                                                    </span>
                                                </td>

                                                <td class="align-middle text-sm">
                                                    @currency($outitem['item']['harga'] * $outitem['jumlah_barang_dibeli'])
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

