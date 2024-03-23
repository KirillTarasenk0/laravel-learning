<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Cache;

class RedisPostController extends BaseController
{
    public function index()
    {
        $posts = Cache::rememberForever('posts:all', function () {
            return Post::all();
        })->each(function ($post) {
            Cache::put('posts:' . $post->id, $post);
        });
        return $posts->pluck('title');
    }
    public function show($id)
    {
        $posts = Cache::get('posts:' . $id);
        return $posts->title;
    }
}
