<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notifikasi extends Model
{
    protected $fillable = [
        'status','pemilik_id','user_id','transaksi_id',
    ];

protected $primaryKey = 'id_notifikasi';

    
public function user(){ //relationship dengan user. Jadi 1 notifikasi dimiliki oleh 1 User
        
        return $this-> belongsTo('App\Models\User','user_id');
        
    }
    
public function pemilik(){
        return $this->belongsTo('App\Models\User','pemilik_id');
    }
    
public function transaksi(){
    return $this->belongsTo('App\Models\Transaksi','transaksi_id');
}
}



