<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatusTransaksi extends Model
{
    protected $fillable = ['transaksi_id','barang_id','status_konfirmasi','status_peminjaman','status_pengembalian',];
    public $table = "statustransaksis";
    protected $primaryKey = 'transaksi_id';
   
  
    
    public function transaksi(){
        
        return $this->hasOne('App\Models\Transaksi');
    }
    public function barang(){
        return $this->hasOne('App\Models\Barang','barang_id');
    }
    
}
