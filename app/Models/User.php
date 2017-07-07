<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','status', 'password','alamat','tanggal_lahir','no_ktp','no_hp',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function barang(){ //relationship dengan barang. Jadi 1 User punya banyak barang
        
        return $this-> hasMany('App\Models\Barang');
        
    }
    
    public function transaksi(){
        return $this-> hasMany('App\Models\Transaksi');
    }
    
    public function notifikasi(){ //jadi 1 user punya banyak notifikasi
        return $this-> hasMany('App\Models\Notifikasi');
    }
    
}
