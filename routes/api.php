<?php

use App\Http\Controllers\Screencast\PlaylistController;
use App\Http\Controllers\Screencast\VideoController;
use Illuminate\Support\Facades\Route;

Route::prefix('playlists')->group(function () {
    Route::get('', [PlaylistController::class, 'index']);
    Route::get('{playlist:slug}', [PlaylistController::class, 'show']);

    Route::get('{playlist:slug}/videos', [VideoController::class, 'index']);
    Route::get('{playlist:slug}/{video:episode}', [VideoController::class, 'show']);
});
