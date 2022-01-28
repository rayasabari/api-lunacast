<?php

namespace App\Http\Controllers\Lunacast;

use App\Http\Controllers\Controller;
use App\Http\Requests\PlaylistRequest;
use App\Models\Lunacast\Playlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PlaylistController extends Controller
{
    public function create()
    {
        return view('playlists.create', [
            'playlist' => new Playlist()
        ]);
    }

    public function store(PlaylistRequest $request)
    {
        Auth::user()->playlists()->create([
            'thumbnail' => $request->file('thumbnail')->store('images/playlist '),
            'name' => $request->name,
            'slug' => Str::slug($request->name . '-' . Str::random(5)),
            'description' => $request->description,
            'price' => $request->price,
        ]);

        return back();
    }

    public function index()
    {
        $playlists = Auth::user()->playlists()->latest()->paginate(10);

        return view('playlists.index', compact('playlists'));
    }

    public function edit(Playlist $playlist)
    {
        return view('playlists.edit', ['playlist' => $playlist]);
    }

    public function update(PlaylistRequest $request, Playlist $playlist)
    {
        if ($request->thumbnail) {
            Storage::delete($playlist->thumbnail);
            $thumbnail = $request->file('thumbnail')->store('images/playlist ');
        } else {
            $thumbnail = $request->thumbnail;
        }
        $playlist->update([
            'thumbnail' => $thumbnail,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
        ]);

        return redirect(route('playlists.index'));
    }
}
