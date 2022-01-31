<?php

namespace Database\Seeders;

use App\Models\Lunacast\Tag;
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
            'Javascript', 'CSS', 'PHP', "Bootstrap", 'Tailwind', 'Laravel', 'Vue JS', 'Nuxt JS', 'React JS', 'Next JS'
        ]);

        $tags->each(function ($tag) {
            Tag::create([
                'name' => $tag,
                'slug' => Str::slug($tag)
            ]);
        });
    }
}
