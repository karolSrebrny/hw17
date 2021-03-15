<?php


namespace App\Http\Controllers;



use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Eloquent\Builder;

class PostByAuthorAndCategoryAndTagController
{
    public function __invoke($authorId, $categoryId, $tagId)
    {
        $posts = Post::where('user_id',$authorId)
            ->where('category_id', $categoryId)
            ->whereHas('tags', function (Builder $query) use ($tagId){
                $query->where('tags.id',$tagId);
            })
            ->paginate(15);
        return view('pages.posts', compact('posts'));
    }


}

