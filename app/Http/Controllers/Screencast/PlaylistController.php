<?php

namespace App\Http\Controllers\Screencast;

use App\Http\Controllers\Controller;
use App\Http\Requests\PlaylistRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class PlaylistController extends Controller
{
    public function create()
    {
        return view('playlists.create');
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

    public function edit()
    {
        return view('playlists.edit');
    }

    public function update(Request $request)
    {
        dd($request);
    }

    public function table()
    {
        $playlists = Auth::user()->playlists()->latest()->paginate(10);
        return view('playlists.table', compact('playlists'));
    }
}
