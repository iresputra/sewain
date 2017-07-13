<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTableStatustransaksi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            
         Schema::create('statustransaksis', function (Blueprint $table) {
            $table->integer('transaksi_id');
            $table->integer('barang_id');
            $table->integer('status_konfirmasi'); //udah di acc permohonanan
            $table->integer('status_peminjaman'); //udah dipindahtangan
            $table->integer('status_pengembalian'); //udah dikembaliin lagi
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
        //
    }
}
