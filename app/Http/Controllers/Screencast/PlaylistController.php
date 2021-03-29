<?php

namespace App\Http\Controllers\Screencast;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class PlaylistController extends Controller
{
    public function create()
    {
        return view('playlists.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'thumbnail' => 'required|image|mimes:jpeg,jpg,png',
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
        ]);

        Auth::user()->playlists()->create([
            'thumbnail' => $request->file('thumbnail')->store('images/playlists'),
            'name' => $request->name,
            'slug' => Str::slug($request->name . "_" . Str::random(6)),
            'description' => $request->description,
            'price' => $request->price,
        ]);

        return back();
    }

    public function table()
    {
        return view('playlists.table');
    }
}
