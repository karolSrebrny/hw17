<?php

namespace App\Http\Controllers;

use App\Models\Post;

class HomeController
{
    public function __invoke()
    {
         $gitHubLink = 'https://github.com/login/oauth/authorize';
           $parameters = [
             'client_id' => env('OAUTH_GITHUB_CLIENT_ID'),
             'redirect_uri' => env('OAUTH_GITHUB_REDIRECT_URI'),
             'scope' => 'user,user:email',
           ];
           $gitHubLink .= '?' . http_build_query($parameters);

        $posts = Post::with(['user', 'category', 'tags'])->paginate(15);

        return view('pages.posts', compact('posts', 'gitHubLink'));
    }
}
