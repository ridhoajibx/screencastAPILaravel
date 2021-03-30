<?php

namespace App\Http\Controllers\Screencast;

use App\Http\Controllers\Controller;
use App\Http\Requests\PlaylistRequest;
use App\Models\Screencast\Playlist;
use App\Models\Screencast\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PlaylistController extends Controller
{
    public function create()
    {
        return view('playlists.create', [
            'playlist' => new Playlist(),
            'tags' => Tag::get()
        ]);
    }

    public function store(PlaylistRequest $request)
    {
        $playlist = Auth::user()->playlists()->create([
            'thumbnail' => $request->file('thumbnail')->store('images/playlists'),
            'name' => $request->name,
            'slug' => Str::slug($request->name . "_" . Str::random(6)),
            'description' => $request->description,
            'price' => $request->price,
        ]);

        $playlist->tags()->sync(request('tags'));

        return back();
    }

    public function edit(Playlist $playlist)
    {
        // if ($playlist->user_id !== Auth::user()->id) {
        //     return redirect(route('table.playlists'));
        // }
        $this->authorize(['update', $playlist]);
        $tags = Tag::get();
        return view('playlists.edit', compact([ 'playlist', 'tags']));
    }

    public function update(PlaylistRequest $request, Playlist $playlist)
    {
        $this->authorize(['update', $playlist]);
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
        
        $playlist->tags()->sync(request('tags'));

        return redirect(route('table.playlists'));
    }

    public function table()
    {
        $playlists = Auth::user()->playlists()->latest()->paginate(10);
        return view('playlists.table', compact(['playlists']));
    }

    public function destroy(Playlist $playlist)
    {
        $this->authorize(['delete', $playlist]);
        Storage::delete($playlist->thumbnail);
        $playlist->tags()->detach();
        $playlist->delete();
        return redirect(route('table.playlists'));
    }
}
