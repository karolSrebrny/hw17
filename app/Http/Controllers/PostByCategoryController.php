<?php


namespace App\Http\Controllers;



use App\Models\Category;

class PostByCategoryController
{
    public function __invoke(Category $category)
    {
        $posts = $category->posts()->paginate(15);

        return view('pages.posts', compact('posts'));
    }


}

