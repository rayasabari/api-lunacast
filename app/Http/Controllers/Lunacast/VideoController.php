<?php

namespace App\Http\Controllers\Lunacast;

use App\Http\Controllers\Controller;
use App\Models\Lunacast\Playlist;
use App\Models\Lunacast\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class VideoController extends Controller
{
    public function index(Playlist $playlist)
    {
        return view('videos.index', [
            'playlist' => $playlist,
            'videos' => $playlist->videos()->paginate(10),
            'title' => 'Videos Index',
            'breadcrumb' => ['Playlist', 'Videos', 'Index']
        ]);
    }

    public function create(Playlist $playlist)
    {
        $this->authorize('update', $playlist);
        return view('videos.create', [
            'playlist' => $playlist,
            'video' => new Video(),
            'title' => 'Add Video',
            'breadcrumb' => ['Playlist', 'Videos', 'Add']
        ]);
    }

    public function store(Playlist $playlist, Request $request)
    {
        $this->authorize('update', $playlist);
        $attr = $request->validate([
            'title' => 'required',
            'unique_video_id' => 'required',
            'episode' => 'required',
            'runtime' => 'required',
        ]);

        $attr['slug'] = Str::slug($request->title);
        $attr['intro'] = $request->intro ? true : false;

        $playlist->videos()->create($attr);

        return back();
    }

    public function edit(Video $video)
    {
        // $this->authorize('update', $playlist);
        return view('videos.edit', [
            'video' => $video,
            'title' => 'Edit Video',
            'breadcrumb' => ['Playlist', 'Videos', 'Edit']
        ]);
    }
}
