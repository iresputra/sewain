<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Barang;
use App\Models\Transaksi;
use App\Models\Notifikasi;
use Redirect;
use Auth;
//use Barryvdh\Snappy\Facades as PDF
use PDF;
use Symfony\Component\HttpFoundation\Session\Session;



class UserController extends Controller
{
    public function getProfile($id){
        
        $user = User::findOrfail($id);
        if($user != null){
        $barangs = Barang::where(['user_id'=>$user->id])->get();
    
        return view('profile_user',['user'=>$user,'barangs'=>$barangs]);
        }
        return view('profile_user',['user'=>$user]);
    }
    
    public function myProfile(){
        
        $datas = User::all();
        if($datas != null){
            return view('profile_saya',['datas'=>$datas]);
            
        }
        else
            return redirect('');
    }
    
    public function editProfile($id){
        
        $user = User::findOrfail($id);
         if(Auth::user()->id == $user->id && $user !=null){
       //ngecek apakah yang login itu yang punya barang
            return view('profile_edit',['user'=>$user]);
            }
        
        else{
            return redirect('');
        }
}
    public function transaksi($user_id){
        $validasi = User::findOrfail($user_id);
        if(Auth::user()->id == $validasi->id){    
       $transaksis = User::with('transaksi')->findOrfail($user_id)->transaksi; //mencari selugetruh transaksi yang punya user
       $notifikasis = Notifikasi::where(['status'=>1,'user_id'=>Auth::user()->id])->update(['status' => 0]);
        return view('transaksi_kamu',['transaksis'=>$transaksis]); 
            }
       
        else{
            return view('errors.404');
        }
    }
        

    
    
    
    
    
}


