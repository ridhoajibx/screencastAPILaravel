<?php

namespace App\Http\Controllers\Screencast;

use App\Http\Controllers\Controller;
use App\Models\Screencast\Playlist;
use App\Models\Screencast\Video;
use Illuminate\Http\Request;
use illuminate\Support\Str;

class VideoController extends Controller
{
    public function table(Playlist $playlist)
    {
        $this->authorize('update', $playlist);
        $videos = $playlist->videos()->orderBy('episode')->paginate(10);
        return view('videos.table', [
            'playlist' => $playlist,
            'videos' => $videos,
            'title' => "Table of videos : {$playlist->name}"
        ]);
    }

    public function create(Playlist $playlist)
    {
        $this->authorize('update', $playlist);
        return view('videos.create', [
            'playlist' => $playlist,
            'title' => "New video : {$playlist->name}",
            'video' => new Video()
        ]);
    }

    public function store(Playlist $playlist, Request $request)
    {
        $this->authorize('update', $playlist);
        $attr = request()->validate([
            'title' => 'required',
            'unique_video_id' => 'required',
            'episode' => 'required',
            'runtime' => 'required',
        ]);
        $attr['slug'] = Str::slug($request->title);
        $attr['intro'] = $request->intro ? true: false;
        
        $playlist->videos()->create($attr);

        return back();
    }
}
