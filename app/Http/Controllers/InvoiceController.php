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
use App\Models\Notifikasi;
use PDF;
use Carbon;
use Intervention\Image\Facades\Image as Image;


use View;
use Symfony\Component\HttpFoundation\Session\Session;





class InvoiceController extends Controller
{
    public function printCheckout($id_transaksi){
         
       $data = Transaksi::find($id_transaksi);
         $mytime = Carbon\Carbon::now();
         $transaksi = array('pemilik'=>$data->pemilik->name,
                           'barang'=>$data->barang->nama_barang,
                            'jumlah'=>$data->kuantitas_sewa,
                            'alamat_peminjam'=>Auth::user()->alamat,
                            'no_ktp_peminjam'=>Auth::user()->no_ktp,
                            'no_hp_peminjam'=>Auth::user()->no_hp,
                            'tanggal_surat'=>$mytime,
                            'tanggal_peminjaman'=>$data->tanggal_peminjaman,
                            'tanggal_pengembalian'=>$data->tanggal_pengembalian,
                            'biaya_sewa'=>$data->biaya_sewa                           
                           );
        
         
         
         $pdf = PDF::loadView('pdf_invoice', $transaksi)->setPaper('a4');
        return $pdf->download('invoice.pdf');
         
         
    }
}
