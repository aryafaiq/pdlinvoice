<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PerusahaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('perusahaans')->insert([
            [
                'nama_perusahaan' => 'PT W1DE LOGISTIC INDONESIA',
                'alamat_perusahaan' => 'JL KELAPA GADING',
                'pic' => 'Bu Annisa',
                'no_tlp' => '0812'
            ],
            [
                'nama_perusahaan' => 'PT DIRAMOTHI LOGISTIK',
                'alamat_perusahaan' => 'JL ENGGANO',
                'pic' => 'Pa Sumyar',
                'no_tlp' => '0813'
            ],
        ]);
    }
}
