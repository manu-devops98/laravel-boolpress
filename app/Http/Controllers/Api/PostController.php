<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(8);

        return response()->json([
            'response' => true,
            'results' => ['posts' => $posts],
        ]);
    }

    public function show($id)
    {
        $post = Post::find($id);

        return response()->json([
            'response' => true,
            'count' => $post ? 1 : 0,
            'results' => [
                'data' => $post
            ]
        ]);
    }
}
