<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Resources\PostResource;
use App\Http\Resources\PostDetailResource;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        // return response()->json(['data'=>$posts]);
        return PostResource::collection($posts);
    }

    public function show($id)
    {
        $post = Post::with('writer:id,username')->findOrFail($id);
        return new PostDetailResource($post);
    }

    public function show2($id)
    {
        $post = Post::findOrFail($id);
        return new PostDetailResource($post);
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'title' => 'required|string|max:255',
        //     'news_content' => 'required|string',
        //     'author' => 'required|string|max:100',
        //     'created_at' => 'nullable|date',
        // ]);
        // $post = Post::create([
        //     'title' => $request->title,
        //     'news_content' => $request->news_content,
        //     'author' => $request->author,
        //     'created_at' => $request->created_at ? date($request->created_at) : now(),
        // ]);
        // return response()->json(['data' => new PostDetailResource($post)], 201);
        return response()->json([
            'message' => 'This endpoint is not implemented yet.'
        ], 501);
    }
}
