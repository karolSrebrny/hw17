<?php


namespace App\Http\Controllers;

use App\Models\Tag;

class PostByTagController
{
    public function __invoke(Tag $tag)
    {

        $posts = $tag->posts()->paginate(15);

        return view('pages.posts', compact('posts'));
    }


}

