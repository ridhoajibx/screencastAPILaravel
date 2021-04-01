<?php

use App\Http\Controllers\Screencast\PlaylistController;
use Illuminate\Support\Facades\Route;

Route::prefix('playlists')->group(function () {
    Route::get('', [PlaylistController::class, 'index']);
});
