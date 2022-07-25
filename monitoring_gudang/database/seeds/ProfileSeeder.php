<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('profiles')->insert([
            'nama_perusahaan' => 'PT. BERKAT KESELAMATAN DUNIA',
            'lokasi' => 'Ruko Graha Asri',
            'alamat' => 'Graha Asri, Blok K6 Ruko, Jl. Ngagel No.179 - 183, Ngagel, Kec. Wonokromo, Kota SBY, Jawa Timur 60246',
            'jam_operasi' => 'Senin	08.00-17.00
                              Selasa 08.00-17.00
                              Rabu 08.00-17.00
                              Kamis	08.00-17.00
                              Jumat	08.00-17.00
                              Sabtu	Tutup
                              Minggu Tutup',
            'telepon' => '(031)5022526',
            'provinsi' => 'Jawa Timur'
        ]);
    }
}
