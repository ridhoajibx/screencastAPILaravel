<?php

namespace App\Http\Controllers\Screencast;

use App\Http\Controllers\Controller;
use App\Http\Requests\TagRequest;
use App\Models\Screencast\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class TagController extends Controller
{
    public function create()
    {
        return view('tags.create', [
            'tag' => new Tag(),
        ]);
    }

    public function store(TagRequest $request, Tag $tag)
    {
        $tag->create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);
        return back();
    }

    public function table()
    {
        $tags = Tag::withCount('playlists')->latest()->paginate(5);
        return view('tags.table', compact('tags'));
    }

    public function edit(Tag $tag)
    {
        return view('tags.edit', compact('tag'));
    }

    public function update(TagRequest $request, Tag $tag)
    {
        $tag->update([
            'name' => $request->name,
        ]);

        return redirect(route('table.tags'));
    }

    public function destroy(Tag $tag)
    {
        $tag->playlists()->detach();
        $tag->delete();
        return redirect(route('table.tags'));
    }
}
