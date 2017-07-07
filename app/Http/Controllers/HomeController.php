<?php

namespace App\Http\Controllers;
use App\Models\Barang;
use App\Models\Notifikasi;
use Illuminate\Http\Request;
use Auth;

use Symfony\Component\HttpFoundation\Session\Session;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $barangfix = Barang::where('konfirmasi_admin',1)
            ->orderBy('nama_barang','desc')
            ->get();
        $barangs = Barang::where('konfirmasi_admin',1)->orderBy('created_at','DESC')->take(3)->get();
        $barangconfirmed = Barang::where(['konfirmasi_admin' => 1])->count();
        $barangunconfirmed = Barang::where(['konfirmasi_admin'=>0])->count();
        
        if(Auth::check()){
        $jumnotifikasi = Notifikasi::where(['status'=> 1,'user_id'=>Auth::user()->id])->count();
        return view('home',['barangfix'=>$barangfix,'barangs'=>$barangs,'barangconfirmed'=>$barangconfirmed,'barangunconfirmed'=>$barangunconfirmed,'jumnotifikasi'=>$jumnotifikasi]);
            
        }
        else{
        
        return view('home',['barangfix'=>$barangfix,'barangs'=>$barangs,'barangconfirmed'=>$barangconfirmed,'barangunconfirmed'=>$barangunconfirmed]);
        }
    }
}
