<?php

namespace App\Http\Controllers\Lunacast;

use App\Http\Controllers\Controller;
use App\Http\Requests\VideoRequest;
use App\Http\Resources\Lunacast\VideoResource;
use App\Models\Lunacast\Playlist;
use App\Models\Lunacast\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    public function store(Playlist $playlist, VideoRequest $request)
    {
        $this->authorize('update', $playlist);
        $attr = $request->all();

        $attr['slug'] = Str::slug($request->title);
        $attr['intro'] = $request->intro ? true : false;

        $playlist->videos()->create($attr);

        return back();
    }

    public function edit(Playlist $playlist, Video $video)
    {
        $this->authorize('update', $playlist);
        return view('videos.edit', [
            'playlist' => $playlist,
            'video' => $video,
            'title' => 'Edit Video',
            'breadcrumb' => ['Playlist', 'Videos', 'Edit']
        ]);
    }

    public function update(Playlist $playlist, Video $video, VideoRequest $request)
    {
        $this->authorize('update', $playlist);
        $attr = $request->all();

        $attr['intro'] = $request->intro ? true : false;

        $video->update($attr);
        return redirect(route('videos.index', $playlist->slug));
    }

    public function destroy(Playlist $playlist, Video $video)
    {
        $this->authorize('update', $playlist);
        $video->delete();

        return redirect(route('videos.index', $playlist->slug));
    }

    public function getVideos(Playlist $playlist, Video $video)
    {
        $data = $playlist->videos()->orderBy('episode', 'ASC')->get();
        return new VideoResource($data);
    }

    public function showVideo(Playlist $playlist, Video $video)
    {
        if (Auth::user()->hasBought($playlist) || $video->intro == 1) {
            return new VideoResource($video);
        }

        return ['message' => 'You must buy playlist before watching!'];
    }
}
