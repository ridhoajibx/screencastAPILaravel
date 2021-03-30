<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Screencast\PlaylistController;
use App\Http\Controllers\Screencast\TagController;
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
        Route::get('{playlist:slug}/edit', [PlaylistController::class, 'edit'])->name('edit.playlists');
        Route::put('{playlist:slug}/edit', [PlaylistController::class, 'update']);
        Route::delete('{playlist:slug}/delete', [PlaylistController::class, 'destroy'])->name('delete.playlists');
    });

    Route::prefix('tags')->middleware('permission:create tags')->group(function(){
        Route::get('/create', [TagController::class, 'create'])->name('create.tags');
        Route::post('/create', [TagController::class, 'store']);
        Route::get('/table', [TagController::class, 'table'])->name('table.tags');
        Route::get('{tag:slug}/edit', [TagController::class, 'edit'])->name('edit.tags');
        Route::put('{tag:slug}/edit', [TagController::class, 'update']);
        Route::delete('{tag:slug}/delete', [TagController::class, 'destroy'])->name('delete.tags');
    });
});

require __DIR__.'/auth.php';
