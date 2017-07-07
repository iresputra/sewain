<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
     public $timestamps = false;
    protected $primaryKey = 'id_transaksi';
     protected $fillable = [
        'status_id','kuantitas_sewa','biaya_sewa','tanggal_peminjaman','tanggal_pengembalian','status_peminjaman','konfirmasi_pemilik','foto_ktp_penyewa',
    ];
  
    public function barang(){
        
        return $this-> belongsTo('App\Models\Barang','barang_id');
    }
    
     public function user(){ //relationship dengan user. Jadi 1 transaksi dimiliki oleh 1 User
        
        return $this-> belongsTo('App\Models\User','user_id');
        
    }
    
    public function pemilik(){
        return $this->belongsTo('App\Models\User','pemilik_id');
    }
    
    public function notifikasi(){
        return $this->belongsTo('App\Models\Notifikasi','notifikasi_id');
    }
    
    public function status(){
        
        return $this->hasOne('App\Models\Statustransaksi','transaksi_id');
       
    

}
}
