<?php


namespace App\Http\Controllers;


use App\Models\Post;

class PostByAuthorController
{
    public function __invoke($id)
    {
        $posts = Post::where('user_id',$id)->paginate(15);
        return view('pages.posts', compact('posts'));
    }


}


