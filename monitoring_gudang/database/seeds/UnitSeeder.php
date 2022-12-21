<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('units') -> insert([
            'satuan'=> 'lusin'
        ]);
        
        DB::table('units') -> insert([
            'satuan'=> 'kilogram'
        ]);
    }
}
