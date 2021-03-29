<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Screencast\PlaylistController;
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

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    Route::prefix('playlists')->middleware('permission:create playlists')->group(function(){
        Route::get('/create', [PlaylistController::class, 'create'])->name('create.playlists');
        Route::post('/create', [PlaylistController::class, 'store']);
        Route::get('/table', [PlaylistController::class, 'table'])->name('table.playlists');
    });
});

require __DIR__.'/auth.php';
