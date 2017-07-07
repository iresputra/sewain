<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Barang;
use App\Models\Statustransaksi;
use App\Models\Transaksi;
use App\Models\Notifikasi;
use Redirect;
use Auth;
//use Barryvdh\Snappy\Facades as PDF
use PDF;

use Intervention\Image\Facades\Image as Image;
use Symfony\Component\HttpFoundation\Session\Session;

use Carbon\Carbon;
class PenyewaController extends Controller
{
     public function sewaBarang(Request $request){
        if(Auth::user()->id != $request->pemilik_id){ 
        $this->validate($request, [
            'kuantitas_sewa'=>'required',
            'tanggalpeminjaman' => 'required|date|after:yesterday',
            'tanggalpengembalian'=>'required|date|after:tanggalpeminjaman',
            'fotoktp'=>'required|image|mimes:jpeg,png,jpg,gif,svg',
            ]);
            
            
            
            
        
        $transaksi = new Transaksi;
        $transaksi->kuantitas_sewa =  $request->kuantitas_sewa;
    
        
        $transaksi->barang_id= $request->id_barang;
        $transaksi->user_id = Auth::user()->id;
        $transaksi->pemilik_id =  $request->pemilik_id;
        $transaksi->tanggal_peminjaman = date('Y-m-d', strtotime(str_replace('-', '/', $request['tanggalpeminjaman'])));
        $transaksi->tanggal_pengembalian = date('Y-m-d', strtotime(str_replace('-', '/', $request['tanggalpengembalian'])));
        
        
        $newName = md5_file($request->file('fotoktp')->getRealPath());
        $guessFileExtension = $request->file('fotoktp')->guessExtension();
        $newImage= $request->file('fotoktp')->move("image/ktp", $newName.'.'.$guessFileExtension);
        
        $transaksi->foto_ktp_penyewa = $newName.'.'.$guessFileExtension; 
            
        $start = Carbon::parse($transaksi->tanggal_peminjaman);
        $end = Carbon::parse($transaksi->tanggal_pengembalian);
        $durasi_sewa = $start->diffInDays($end);
        $transaksi->biaya_sewa = $request->kuantitas_sewa*$request->harga_barang*$durasi_sewa;
       
        $transaksi->save();
            
        $status = new Statustransaksi;
        $status->transaksi_id = $transaksi->id_transaksi;
        $status->save();
       

        $notifikasi = new Notifikasi;
        $notifikasi->user_id = Auth::user()->id;
        $notifikasi->pemilik_id = $request->pemilik_id;
        $notifikasi->transaksi_id = $transaksi->id_transaksi;
        $notifikasi->save();
            
        
        
            
      /*  $notifpemilik = new Notifpemilik;
        $notifikasi->user_id = Auth::user()->id;
        $notifikasi->pemilik_id = $request->pemilik_id;
        $notifikasi->transaksi_id = $transaksi->id_transaksi;
        $notifikasi->save();
            */
        
        
        
       /* Session::flash('flash_message','Office successfully added.');*/
        return redirect()->back()->with('status','Transaksi berhasil');
        }
         else{
             return redirect()->back()->with('warning','Kamu tidak dapat menyewa barang sendiri');
         }
    }
    
 
    
    public function formPenyewaan($id_transaksi){
        $barang = Transaksi::findOrfail($id_transaksi);
        
         return view('form_penyewaan',['barang'=>$barang]);
        
    }
    
    public function cekPeminjaman($id_transaksi){
        $transaksi = Transaksi::findOrfail($id_transaksi);
        return view('cek_peminjaman',['transaksi'=>$transaksi]);
    }
    
      public function konfirmasiPenerimaan($transaksi_id){
          
        $validasi = Transaksi::findOrfail($transaksi_id);
          
        if($validasi->user_id == Auth::user()->id){  
        $transaksi = Statustransaksi::find($transaksi_id);
        $transaksi->status_peminjaman = 1;
        $transaksi->save();
        
        return redirect()->back()->with('status','Barang sudah kamu terima');
        }
          
        else
            echo "kamu bukan siapa2";
        
    }
    
    public function detailTransaksi($id_transaksi){
        
        $data = Transaksi::findOrfail($id_transaksi);
        
        if($data->user_id == Auth::user()->id){
            return view('detail_transaksi',['data'=>$data]);
        }
        
        else{
            return view('errors.404');
        }
    }
}
