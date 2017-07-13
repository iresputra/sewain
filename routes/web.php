<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [
    'uses'=>'HomeController@index',
    'as' => 'index'
]);
   


Auth::routes();
Route::get('/produk/{id_barang}',[
    'uses'=> 'BarangController@showdeskripsibarang',
    'as'=>'show.barang'
]);


Route::get('/profile-user/{id}',[
'uses'=>    'UserController@getProfile',
    'as'=>'show_user'

]);

Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::get('/katalog-barang',[
    'uses'=>'BarangController@katalogBarang',
    'as'=>'katalog_barang'
]);

Route::get('prosedur-penyewaan',[
   'uses'=>'BarangController@showProsedur',
    'as'=>'show_prosedur'
    
]);


//user
Route::group(['middleware' => 'user'], function () {
    
Route::get('/profile-kamu',[
'uses' => 'UserController@myProfile',
    'as' => 'show_my_profile'
]);

Route::get('/edit-profile/{id}',[
    
   'uses' => 'UserController@editProfile',
    'as'=>'edit_profile'
]);

Route::get('/tambah-barang',[
    'uses'=>'BarangController@tambah',
    'as'=>'tambah_barang'
]);

Route::get('/edit-barang/{id_barang}',[
    'uses'=>'BarangController@editBarang',
    'as'=>'edit_barang'
]);


Route::post('/prosestambah','BarangController@prosestambah');
    
Route::post('/produk/sewa-barang/',[
    'uses' => 'PenyewaController@sewaBarang',
    'as' => 'sewa.barang'
]);    
    

Route::get('/produk-kamu',[
    'uses'=>'BarangController@showbarangpemilik',
    'as'=>'barang_anda'
]);
Route::get('/produk-kamu/edit/{id_barang}',[
    'uses' => 'BarangController@editbarang',
    'as'=> 'edit.barang']);

Route::post('/produk-kamu/edit/update/{id_barang}',[
    'uses'=>'BarangController@updatebarang',
    'as'=>'update.barang']);

Route::get('/produk-kamu/hapus/{id_barang}','BarangController@hapusbarang');   
    
Route::get('/transaksi-kamu/{user_id}',[
    'uses' => 'UserController@transaksi',
    'as'=> 'transaksi.user']);
    
   
Route::get('peminjaman-barang/',[
    'uses'=>'PemilikController@peminjamanBarang',
    'as'=>'cek_peminjaman'
]);
    

    
Route::get('print-checkout/{id_transaksi}',[
    'uses'=>'InvoiceController@printCheckout',
    'as'=>'print_checkout'
]);
Route::get('print-profile',[
    'uses'=>'UserController@printProfile',
    'as'=>'print_profile'
    
    
]);    


Route::get('form-penyewaan/{id_transaksi}',[
    'uses'=>'PenyewaController@formPenyewaan',
    'as'=>'form_penyewaan'
]);
   
    
Route::get('cek-peminjaman/{id_transaksi}',[
    'uses'=>'PenyewaController@cekPeminjaman',
    'as'=>'transaksi_peminjaman'
]);

Route::get('setujui-transaksi/{transaksi_id}',[
   'uses'=>'PemilikController@setujuiPermohonan',
    'as'=>'konfirmasi_permohonan_peminjaman'
]);
    
Route::get('tolak-transaksi/{transaksi_id}',[
    'uses'=>'PemilikController@tolakPermohonan',
    'as'=>'tolak_permohonan_peminjaman'
]);
    Route::get('hapus-permohonan/{transaksi_id}',[
    'uses'=>'PemilikController@hapusPermohonan',
    'as'=>'hapus_permohonan'
]);
    Route::get('konfirmasi-penerimaan/{transaksi_id}',[
    'uses'=> 'PenyewaController@konfirmasiPenerimaan',
    'as'=>'konfirmasi_penerimaan'
        
    ]);
    
    Route::get('konfirmasi-pengembalian/{transaksi_id}',[
       'uses'=>'PemilikController@konfirmasiPengembalian',
        'as'=>'konfirmasi_pengembalian'
    ]);
    
    Route::get('detail-transaksi/{id_transaksi}',[
        'uses'=>'PenyewaController@detailTransaksi',
        'as'=>'detail_transaksi'
    ]);
    Route::get('/hapus-barang/{id_barang}',[
    'uses' => 'PemilikController@hapusBarang',
    'as'=>'hapus_barang'
]);

    
});



Route::group(['middleware' => 'admin'], function () {

Route::get('/konfirmasi-barang/{id_barang}',[
    'uses' => 'AdminController@konfirmBarang',
    'as' => 'konfirm_barang'

]);
    
Route::get('/admin',[
    'uses'=>'AdminController@dashboardAdmin',
    'as'=>'dashboard_admin'
]);

Route::get('/cancel-barang/{id_barang}',[
    'uses' => 'AdminController@cancelBarang',
    'as' => 'cancel_barang'
]);

Route::get('/delete-barang/{id_barang}',[
    'uses' => 'AdminController@deleteBarang',
    'as'=>'delete_barang'
]);


Route::get('/database-user',[
'uses' => 'AdminController@showAllUser',
'as' => 'show_all_user'
]); 
  
Route::get('/show-transaksi',[
    'uses'=>'AdminController@showAllTransaksi',
    'as'=>'show_all_transaction'
]);



    
});