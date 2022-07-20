<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('categories')->insert(['nama_kategori' => 'Sepatu Safety', 'deskripsi_barang'=>'Ini dibuat untuk keamanan sepatu']);
        
        DB::table('categories')->insert(['nama_kategori' => 'Sepatu Boots', 'deskripsi_barang'=>'Ini dibuat untuk keamanan sepatu boots']);
        
        DB::table('categories')->insert(['nama_kategori' => 'Helm', 'deskripsi_barang'=>'Ini dibuat untuk keamanan helm']);

        DB::table('categories')->insert(['nama_kategori' => 'Kacamata', 'deskripsi_barang'=>'Ini dibuat untuk keamanan kacamata']);
        
        DB::table('categories')->insert(['nama_kategori' => 'Sarung Tangan', 'deskripsi_barang'=>'Ini dibuat untuk keamanan sarung tangan']);
    }
}
