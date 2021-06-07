<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class PelangganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pelanggan = [
            [
                'id_pelanggan'      => 1,
                'nama_pelanggan'    => 'Pramudya Wibowo',
                'alamat'            => 'Kota Probolinggo',
                'no_telepon'        => '082244101304',
            ],
            [
                'id_pelanggan'      => 2,
                'nama_pelanggan'    => 'Annisa Wahyu Maulida',
                'alamat'            => 'Situbondo',
                'no_telepon'        => '082257701331',
            ],
            [
                'id_pelanggan'      => 3,
                'nama_pelanggan'    => 'Abdur Rozak Junaedi',
                'alamat'            => 'Kota Probolinggo',
                'no_telepon'        => '085755804391',
            ],
            [
                'id_pelanggan'      => 4,
                'nama_pelanggan'    => 'Khosy Robbin Hood',
                'alamat'            => 'Banyuwangi',
                'no_telepon'        => '082232598644',
            ],
        ];
        
        DB::table('pelanggan')->insert($pelanggan);
    }
}
