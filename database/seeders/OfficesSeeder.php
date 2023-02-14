<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OfficesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('offices')->insert([
            [
            'office'=>'PEO'
                ],[
            'office'=>'PPDO'
                ],[
            'office'=>'PBO'
                ],[
            'office'=>'BAC'
                ],[
            'office'=>'PGO'
                ],[
            'office'=>'Accounting'
                ],[
            'office'=>'PTO'
                ],[
            'office'=>'Cashier\'s Office'
                ]
        ]);
    }
}
