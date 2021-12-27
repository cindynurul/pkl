<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(
    [
        'register' => false
    ]
);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//route admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:admin']],
    function () {
        Route::get('/', function () {
            return 'halaman admin';
        });
        
        Route::get('profile', function () {
            return 'halaman profil admin';
        });

        Route::get('kategori', function () {
            return view('admin.kategori.index');
        });

        // // Route::get('galeri', function () {
        // //     return view('admin.galeri.index');
        // // });

        // Route::get('objek_wisata', function () {
        //     return view('admin.objek_wisata.index');
        // });
        
    });

    //member
    Route::group(['prefix' => 'superadmin', 'middleware' => ['auth', 'role:superadmin']],
    function () {
        Route::get('/', function () {
            return 'halaman superadmin';
        });
        
        Route::get('profile', function () {
            return 'halaman profil superadmin';
        });

     
    });