<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Input;
use DB;
use Auth;
use Redirect;
use App\Models\User;
use App\Models\Barang;
use App\Models\Cart;
use App\Models\Transaksi;
use App\Models\Statustransaksi;
use App\Models\Notifikasi;
use PDF;
use Carbon\Carbon;
use Intervention\Image\Facades\Image as Image;





class PemilikController extends UserController
{
    public function peminjamanBarang(){
        /*$barang = Barang::all();*/
        
            $transaksis = Transaksi::where(['pemilik_id'=>Auth::user()->id])->orderBy('tanggal_transaksi','DESC')->paginate(10); //cek validasi 
          
        
            
        
        return view('peminjaman_barang',['transaksis'=>$transaksis]);
            
    }
    
    public function setujuiPermohonan($transaksi_id){
        
        $validasi = Transaksi::findOrfail($transaksi_id);
        
        if($validasi->pemilik_id == Auth::user()->id){
        
        $konfirmasi = Statustransaksi::find($transaksi_id);
        
        $konfirmasi->status_konfirmasi = 1;
       
    
            
       
        Notifikasi::where('transaksi_id', '=', $konfirmasi->transaksi_id)->update(['status' => '1']);
            
        
        $konfirmasi->save();
        
        
        return redirect()->back()->with('status','Permohonan berhasil disetujui');
        }
        
        else{
            return view('errors.404');
        }
    }
    
    public function tolakPermohonan($transaksi_id){
        $validasi = Transaksi::findOrfail($transaksi_id);
        if($validasi->pemilik_id == Auth::user()->id){
        
        $tolak = Statustransaksi::find($transaksi_id);
        $tolak->status_penolakan = 1;
        $tolak->status_konfirmasi = 1;
            
        $notifikasis = Notifikasi::all();
        
        foreach($notifikasis as $notifikasi){
        if($notifikasi->transaksi_id == $tolak->transaksi_id){
        $notifikasi->status = 1;
        }
        }    
        
        $notifikasi->save();
        $tolak->save();
        
        return redirect()->back()->with('status','Permohonan berhasil ditolak');
        }
        else
            return view('errors.404');
    }
    
     public function hapusPermohonan($transaksi_id){
        $transaksi = Transaksi::findOrfail($transaksi_id);
        $transaksi->delete();
        
        return redirect()->back()->with('status','Permohonan berhasil dibatalkan');
    }
    
  
    
    public function konfirmasiPengembalian($transaksi_id){
        $transaksi = Statustransaksi::findOrfail($transaksi_id);
        $transaksi -> status_pengembalian = 1;
        
            return redirect()->back->with('status','Barang sudah kamu terima kembali');
    }
  
}
