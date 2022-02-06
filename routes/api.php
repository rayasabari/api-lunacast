<?php

use App\Http\Controllers\Auth\MeController;
use App\Http\Controllers\Lunacast\PlaylistController;
use App\Http\Controllers\Lunacast\VideoController;
use Illuminate\Support\Facades\Route;

Route::prefix('playlists')->group(function () {
    Route::get('', [PlaylistController::class, 'getPlaylists']);
    Route::get('/{playlist:slug}', [PlaylistController::class, 'showPlaylist']);

    Route::get('/{playlist:slug}/videos', [VideoController::class, 'getVideos']);
    Route::get('/{playlist:slug}/episode/{video:episode}', [VideoController::class, 'showVideo']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/me', MeController::class);
});
