<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PetugasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $petugas = [
            [
                'id_petugas'      => 1,
                'nama_petugas'    => 'Dandi Agung Setiawan',
                'alamat'            => 'Lumajang',
                'no_telepon'        => '087846184617',
            ],
            [
                'id_petugas'      => 2,
                'nama_petugas'    => 'Auzan Ihtifazuddin Fau Zul Hasmi',
                'alamat'            => 'Jember',
                'no_telepon'        => '081234018065',
            ],
        ];
        
        DB::table('petugas')->insert($petugas);
    }
}
