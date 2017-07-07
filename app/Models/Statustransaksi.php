<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatusTransaksi extends Model
{
    protected $fillable = ['transaksi_id','status_konfirmasi','status_peminjaman','status_pengembalian',];
    
    protected $primaryKey = 'transaksi_id';
   
  
    
    public function transaksi(){
        
        return $this->hasOne('App\Models\Transaksi','transaksi_id');
    }
    public function barang(){
        return $this->hasMany('App\Models\Barang','barang_id');
    }
    
    
    
}
