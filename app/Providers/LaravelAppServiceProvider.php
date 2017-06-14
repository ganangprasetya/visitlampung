<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class LaravelAppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $halaman = '';
        if(Request::segment(1) == 'dashboard'){
            $halaman = 'dashboard'
        }
        if(Request::segment(1) == 'transaksi'){
            $halaman = 'transaksi'
        }
        if(Request::segment(1) == 'objekwisata'){
            $halaman = 'objekwisata'
        }
        if(Request::segment(1) == 'users'){
            $halaman = 'users'
        }
        if(Request::segment(2) == 'kabupaten'){
            $halaman = 'objekwisata'
        }
        if(Request::segment(2) == 'kecamatan'){
            $halaman = 'objekwisata'
        }
        if(Request::segment(2) == 'jenisobjekwisata'){
            $halaman = 'objekwisata'
        }
        view()->share('halaman', $halaman);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
