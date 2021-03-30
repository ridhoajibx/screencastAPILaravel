<?php

namespace Database\Seeders;

use App\Models\Screencast\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = collect([
            'Javascript', 'HTML', 'CSS', 'PHP', 'Bootstrap CSS', 'Tailwind CSS', 'Laravel', 'Lumen', 'React JS'
        ]);

        $tags->each(function($tag) {
            Tag::create([
                'name' => $tag,
                'slug' => Str::slug($tag)
            ]);
        });
    }
}
