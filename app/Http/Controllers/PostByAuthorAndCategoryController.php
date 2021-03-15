<?php


namespace App\Http\Controllers;



use App\Models\Category;
use App\Models\Post;

class PostByAuthorAndCategoryController
{
    public function __invoke($authorId, $categoryId)
    {
        $posts = Post::where('user_id',$authorId)->where('category_id', $categoryId)->paginate(15);
        return view('pages.posts', compact('posts'));
    }


}

