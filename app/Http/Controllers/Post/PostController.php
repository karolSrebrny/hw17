<?php


namespace App\Http\Controllers\Post;


use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController
{
    public function create()
    {
        $users = User::all();
        $categories = Category::all();
        $tags = Tag::all();

        return view('post.form', compact('users', 'categories', 'tags'));
    }

    public function store(Request $request)
    {

        $data = $request ->validate([
            'title' =>['required', 'unique:posts,title'],
            'body' => ['required', 'min:10'],
            'user_id'=>['required', 'exists:users,id'],
            'category_id' =>['required','exists:categories,id'],
            'tags' =>['required','exists:tags,id'],
            ]);
        $data['user_id'] = Auth::id();

        $post = Post::create($data);
        $post->tags()->attach($data['tags']);

        return redirect()->route('home');
    }

    public function edit(Post $post)
    {
        $users = User::all();
        $categories = Category::all();
        $tags = Tag::all();

        return view('post.form', compact('users', 'categories', 'tags', 'post'));

    }

    public function update(Request $request, Post $post)
    {
        $data = $request ->validate([
            'title' =>['required', 'unique:posts,title'],
            'body' => ['required', 'min:10'],
            'category_id' =>['required','exists:categories,id'],
            'tags' =>['required','exists:tags,id'],
        ]);



        $post->update($data);
        $post->tags()->sync($data['tags']);

        return redirect()->route('home');

    }

    public function delete(Post $post)
    {

    $post->delete();
    return redirect()->route('home');

    }
}
