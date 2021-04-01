<?php

namespace App\Http\Controllers\Screencast;

use App\Http\Controllers\Controller;
use App\Http\Requests\VideoRequest;
use App\Http\Resources\Screencast\VideoResource;
use App\Models\Screencast\Playlist;
use App\Models\Screencast\Video;
use Illuminate\Http\Request;
use illuminate\Support\Str;

class VideoController extends Controller
{
    public function index(Playlist $playlist)
    {
        $videos = $playlist->videos()->orderBy('episode')->get();
        return VideoResource::collection($videos);
    }

    public function show(Playlist $playlist, Video $video)
    {
        return new VideoResource($video);
    }

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

    public function store(Playlist $playlist, VideoRequest $request)
    {
        $this->authorize('update', $playlist);
        $attr = $request->all();
        $attr['slug'] = Str::slug($request->title . '-' .Str::random(6));
        $attr['intro'] = $request->intro ? true: false;
        
        $playlist->videos()->create($attr);

        return back();
    }

    public function edit(Playlist $playlist, Video $video)
    {
        return view('videos.edit', [
            'playlist' => $playlist,
            'video' => $video,
            'title' => "Edit : {$playlist->name} - {$video->title}"
        ]);
    }

    public function update(Playlist $playlist, Video $video, VideoRequest $request)
    {
        $this->authorize('update', $playlist);
        $attr = $request->all();
        $attr['intro'] = $request->intro ? true: false;       
        $video->update($attr);

        return redirect(route('table.videos', $playlist->slug));
    }

    public function destroy(Playlist $playlist, Video $video)
    {
        $this->authorize('delete', $playlist);
        $video->delete();

        return redirect(route('table.videos', $playlist->slug));
    }
}
