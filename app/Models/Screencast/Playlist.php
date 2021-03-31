<?php

namespace App\Models\Screencast;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    use HasFactory;
    protected $fillable = ['thumbnail', 'name', 'slug', 'description', 'price'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getPictureAttribute()
    {
        return asset('storage/' . $this->thumbnail);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function videos()
    {
        return $this->hasMany(Video::class);
    }
}
