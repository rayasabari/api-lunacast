<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Lunacast\PlaylistController;
use App\Http\Controllers\Lunacast\TagController;
use App\Http\Controllers\Lunacast\VideoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    Route::prefix('playlists')->middleware('permission:create playlists')->group(function () {
        Route::get('/index', [PlaylistController::class, 'index'])->name('playlists.index');
        Route::get('/create', [PlaylistController::class, 'create'])->name('playlists.create');
        Route::post('/create', [PlaylistController::class, 'store']);
        Route::get('/{playlist:slug}/edit', [PlaylistController::class, 'edit'])->name('playlists.edit');
        Route::put('/{playlist:slug}/edit', [PlaylistController::class, 'update']);
        Route::delete('/{playlist:slug}/delete', [PlaylistController::class, 'destroy'])->name('playlists.delete');
    });

    Route::prefix('tags')->group(function () {
        Route::middleware('permission:create tags')->group(function () {
            Route::get('/index', [TagController::class, 'index'])->name('tags.index');
            Route::get('/create', [TagController::class, 'create'])->name('tags.create');
            Route::post('/create', [TagController::class, 'store']);
        });

        Route::middleware(['permission:delete tags', 'permission:edit tags'])->group(function () {
            Route::get('/{tag:slug}/edit', [TagController::class, 'edit'])->name('tags.edit');
            Route::put('/{tag:slug}/edit', [TagController::class, 'update']);
            Route::delete('/{tag:slug}/delete', [TagController::class, 'destroy'])->name('tags.delete');
        });
    });

    Route::prefix('videos')->middleware('permission:create playlists')->group(function () {
        Route::get('/index/{playlist:slug}', [VideoController::class, 'index'])->name('videos.index');
        Route::get('/create/into/{playlist:slug}', [VideoController::class, 'create'])->name('videos.create');
        Route::post('/create/into/{playlist:slug}', [VideoController::class, 'store']);
        Route::get('/{playlist:slug}/{video:unique_video_id}/edit', [VideoController::class, 'edit'])->name('videos.edit');
        Route::put('/{playlist:slug}/{video:unique_video_id}/edit', [VideoController::class, 'update']);
        Route::delete('/{playlist:slug}/{video:unique_video_id}/edit', [VideoController::class, 'destroy'])->name('videos.delete');
    });
});

require __DIR__ . '/auth.php';
