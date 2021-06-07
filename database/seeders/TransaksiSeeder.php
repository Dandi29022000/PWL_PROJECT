<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $transaksi = [
            [
                'name'          => 'Ventela x Badjatex',
                'description'   => 'Public high and low denim. Black dan juga ada yang blue denim.',
                'image'         => '/images/ventela-1.jpg',
                'price'         => 270000,
                'weigth'        => 250,
            ],
            [
                'name'          => 'Ventela x Nevertoolavish High',
                'description'   => 'Size 37-43 cm',
                'image'         => '/images/ventela-2.jpg',
                'price'         => 470000,
                'weigth'        => 350,
            ],
            [
                'name'          => 'Jhonson Galaxy Pro LC Women Yellow',
                'description'   => 'Size 36-42 cm',
                'image'         => '/images/johnson-1.jpg',
                'price'         => 250000,
                'weigth'        => 200,
            ],
            [
                'name'          => 'Patrobas Ivan Maroon Low & High',
                'description'   => 'Size 37-44 cm',
                'image'         => '/images/patrobas-1.jpg',
                'price'         => 270000,
                'weigth'        => 250,
            ],
        ];
        
        DB::table('transaksi')->insert($transaksi);
    }
}
