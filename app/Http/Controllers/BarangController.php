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


use View;
use Symfony\Component\HttpFoundation\Session\Session;


class BarangController extends Controller
{
  
    
    
    //SEBAGAI PEMILIK BARANG
    public function tambah(){
        if(Auth::check() and (!Auth::guest())){

       return view('tambah_barang');
    }
        else{
            return Redirect::to('login');
        }
    }
    
    public function prosestambah(Request $request){
       $this->validate($request, [
            'nama_barang' => 'required',
            'harga_barang' => 'required',
            'kuantitas_barang'=>'required|min:1',
            'deskripsi_barang'=>'required',
            'fotobarang' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            ]);
        $barang = new Barang;
        $barang->user_id = Auth::user()->id;
        $barang->nama_barang = $request->nama_barang;
        $barang->harga_barang = $request->harga_barang;
        $barang->kuantitas_barang = $request->kuantitas_barang;
        $barang->deskripsi_barang = $request->deskripsi_barang;
        
        
        $file = $request->file('fotobarang');
        $fileName = $file->getClientOriginalName();
        $request->file('fotobarang')->move("image/", $fileName);
        
        $barang->foto_barang = $fileName;
        
        
        
       
        
        
        
        
        $barang->save();
        return redirect()->back()->with('status','Barang berhasil ditambah');
        }
    
    public function showbarangpemilik(){
        
        if(Auth::check() or !Auth::guest()){
        $barangs = Barang::all();
        
        return view('listbarang')->with('barangs',$barangs);
            }
        else{
            return Redirect::to('');
        }
        
    }
    
    public function katalogBarang(){
        
        $barangs = Barang::where(['konfirmasi_admin' => 1])->paginate(12);
        return view('katalog_barang',['barangs'=>$barangs]);
    }
    
    public function editbarang($id_barang){
        $data = Barang::find($id_barang);
        if(Auth::user()->id == $data->user_id){ //ngecek apakah yang login itu yang punya barang

        return view('edit_barang')->with('data',$data);
            }
        
        else{
            return redirect()->back();
        }
    }
        
    
    
    public function updatebarang(Request $request, $id_barang){
    
        $barang = Barang::findOrfail($id_barang);
        $barang->nama_barang = $request->nama_barang;
        $barang->harga_barang = $request->harga_barang;
        $barang->kuantitas_barang = $request->kuantitas_barang;
        $barang->foto_barang = $request->fotobarang;
        $barang->deskripsi_barang = $request->deskripsi_barang;
        
        //jadi kalo ngedit barang, perubahan data kan akan berubah, maka harus diubah lagi konfirmasi_admin nya jadi 0
        //terus harus diverifikasi ulang oleh admin
        if($barang->konfirmasi_admin == 1){
            $barang->konfirmasi_admin = 0;
        }
        $barang->save();
        
        return redirect()->route('barang_anda');
        
    
        
    }
            
    
    public function hapusbarang($id_barang){
    
        $barang = Barang::findOrfail($id_barang);
        $barang->delete();
        return redirect()->back();
        
        
    }
   
    public function showdeskripsibarang($id_barang){
        $data = Barang::findOrfail($id_barang); 
        
        
        if($data->konfirmasi_admin==1){
        return View::make('deskripsi_barang')->with(['data'=>$data]);
        }
        
        return view('errors.404');
        
    }
    
    //SEBAGAI PENYEWA
    public function sewaBarang(Request $request){
        $this->validate($request, [
            'kuantitas_sewa'=>'required',
            'tanggalpeminjaman' => 'required|date|after:yesterday',
            'tanggalpengembalian'=>'required|date|after:tanggalpeminjaman'
            ]);
        
        $transaksi = new Transaksi;
        $transaksi->kuantitas_sewa =  $request->kuantitas_sewa;
        $transaksi->barang_id= $request->id_barang;
        $transaksi->user_id = Auth::user()->id;
        $transaksi->pemilik_id =  $request->pemilik_id;
        $transaksi->tanggal_peminjaman = date('Y-m-d', strtotime(str_replace('-', '/', $request['tanggalpeminjaman'])));
        $transaksi->tanggal_pengembalian = date('Y-m-d', strtotime(str_replace('-', '/', $request['tanggalpengembalian'])));
        
        
        $start = Carbon::parse($transaksi->tanggal_peminjaman);
        $end = Carbon::parse($transaksi->tanggal_pengembalian);
        $durasi_sewa = $start->diffInDays($end);
        $transaksi->biaya_sewa = $request->kuantitas_sewa*$request->harga_barang*$durasi_sewa;
        
        $transaksi->save();
        
        $notifikasi = new Notifikasi;
        $notifikasi->user_id = Auth::user()->id;
        $notifikasi->pemilik_id = $request->pemilik_id;
        $notifikasi->transaksi_id = $transaksi->id_transaksi;
        
        $notifikasi->save();
        
        
       /* Session::flash('flash_message','Office successfully added.');*/
        return redirect()->back()->with('status','Transaksi berhasil');
    }
    
 
    
    public function formPenyewaan($id_transaksi){
        $barang = Transaksi::findOrfail($id_transaksi);
        
         return view('form_penyewaan',['barang'=>$barang]);
        
    }
    
    public function cekPeminjaman($id_transaksi){
        $transaksi = Transaksi::findOrfail($id_transaksi);
        return view('cek_peminjaman',['transaksi'=>$transaksi]);
    }
    
    
   
}
