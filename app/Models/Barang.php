<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
   protected $fillable = [
        'nama_barang', 'harga_barang','kuantitas_barang', 'kategori_barang','deskripsi_barang','foto_barang',
    ];
    
    public function user(){ //relationship dengan user. Jadi 1 barang dimiliki oleh 1 User
        
        return $this-> belongsTo('App\Models\User','user_id');
        
    }
    
    public function transaksi(){ //1 barang punya banyak transaksi
        
        return $this->hasMany('App\Models\Transaksi','barang_id');
        
    }
    
    public function status(){ ///1 barang punya banyak histori peminjaman
        return $this->hasMany('App\Models\Statustransaksi','barang_id');
    }
    protected $primaryKey = 'id_barang';
}
