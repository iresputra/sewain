<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Input;
use DB;
use Auth;
use Redirect;
use App\Models\User;
use App\Models\Barang;
use App\Models\Transaksi;
use Session;


class AdminController extends Controller
{
    
    public function __construct(){
        $totalbarang =0;
        $totalconfirmedbarang = 0;
        $totalunconfirmedbarang = 0;
        
    }
    
    public function dashboardAdmin(){
        $barangs = Barang::all();
        $barangconfirmed = Barang::where(['konfirmasi_admin' => 1])->count();
        $barangunconfirmed = Barang::where(['konfirmasi_admin'=>0])->count();
        $users = User::all()->count();
        return view('admin.dashboard_admin',['barangs'=>$barangs,'barangunconfirmed'=>$barangunconfirmed,'barangconfirmed'=>$barangconfirmed,'users'=>$users]);
        
    }
    
    
    //ubah semuanya ini, masih queryan
    public function konfirmBarang($id_barang){
        $barang = Barang::findOrfail($id_barang);
        
        $barang->konfirmasi_admin = 1;
        
        $barang->save();
        
        
       /* DB::table('barangs')->where('id_barang','=',Input::get('id_barang'))->update(['konfirmasi_admin'=>1]);*/
        return redirect()->back()->with('status','Barang berhasil dikonfirmasi');

    }
    
    public function cancelBarang(Request $request, $id_barang){
        $barang = Barang::findOrfail($id_barang);
        $barang->konfirmasi_admin = 0;
        
        $barang->save();
        
        /*DB::table('barangs')->where('id_barang','=',Input::get('id_barang'))->update(['konfirmasi_admin'=>0]);*/
        return redirect()->back()->with('status','Barang berhasil dibatalkan');;
        
    }
    
    public function deleteBarang($id_barang){
        $barang = Barang::findOrfail($id_barang);
        $barang->delete();
        
        
        /*DB::table('barangs')->where('id_barang','=',Input::get('id_barang'))->delete();
*/        return redirect()->back()->with('status','Barang berhasil dihapus');
    }
    

    public function showAllUser(){
        $users = User::all();
        $jumlahuser = User::where(['status'=>0])->count();
        return view('admin.show-users',['users'=>$users,'jumlahuser'=>$jumlahuser]);
    }
    
    public function showAllTransaksi(){
        $transaksis = Transaksi::all();
       /* $jumlahtransaksi = Transaksi::all->count();*/
        return view('admin.show-transaksis',['transaksis'=>$transaksis]);
        
    }
}
