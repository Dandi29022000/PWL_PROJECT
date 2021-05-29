<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->integer('id_pelanggan');
            $table->integer('id_petugas');
            $table->string('tanggal', 10);
            $table->integer('kd_produk');
            $table->integer('harga');
            $table->integer('qty');
            $table->integer('satuan');
            $table->integer('total_bayar');
            $table->foreign('id_pelanggan')->references('id_pelanggan')->on('pelanggan')->onDelete('cascade');
            $table->foreign('id_petugas')->references('id_petugas')->on('petugas')->onDelete('cascade');
            $table->foreign('kd_produk')->references('id')->on('products')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
}
