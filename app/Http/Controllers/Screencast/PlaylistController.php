<?php

namespace App\Http\Controllers\Screencast;

use App\Http\Controllers\Controller;
use App\Http\Requests\PlaylistRequest;
use App\Models\Screencast\Playlist;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
            'thumbnail' => $request->file('thumbnail')->store('images/playlists'),
            'name' => $request->name,
            'slug' => Str::slug($request->name . "_" . Str::random(6)),
            'description' => $request->description,
            'price' => $request->price,
        ]);

        return back();
    }

    public function edit(Playlist $playlist)
    {
        return view('playlists.edit', [ 'playlist'=>$playlist]);
    }

    public function update(PlaylistRequest $request, Playlist $playlist)
    {
        if ($request->thumbnail) {
            Storage::delete($playlist->thumbnail);
            $thumbnail = $request->file('thumbnail')->store('images/playlists');
        }else {
            $thumbnail = $playlist->thumbnail;
        }
        $playlist->update([
            'thumbnail' => $thumbnail,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
        ]);

        return redirect(route('table.playlists'));
    }

    public function table()
    {
        $playlists = Auth::user()->playlists()->latest()->paginate(10);
        return view('playlists.table', compact('playlists'));
    }
}
