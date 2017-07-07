<?php

namespace App\Providers;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Notifikasi;
use Auth;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        
        /*$data = Notifikasi::where(['status'=> 1,'user_id'=>Auth::user()->id])->count();*/
        /*View::share( 'jumnotifikasi', $data );*/
        
       //GLOBAL VARIABEL
       /* $data = 2*/
        
        $datas = Notifikasi::where(['status'=> 1])->get();
        $jum=0;
      
        view()->share('datas',$datas);
        
        view()->share('jumnotifikasi',$jum);
        
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
