<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Resources\PostResource;
use App\Http\Resources\PostDetailResource;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        // return response()->json(['data'=>$posts]);
        return PostDetailResource::collection($posts->loadMissing(['writer:id,username','comments:id,post_id,user_id,comment_content,created_at']));
    }

    public function show($id)
    {
        $post = Post::with('writer:id,username')->findOrFail($id);
        return new PostDetailResource($post->loadMissing(['writer:id,username','comments:id,post_id,user_id,comment_content,created_at']));
    }

    public function show2($id)
    {
        $post = Post::findOrFail($id);
        return new PostDetailResource($post);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'news_content' => 'required',
            // 'author' => 'required|string|max:100',
            // 'created_at' => 'nullable|date',
        ]);
        $request['author'] = Auth::user()->id;
        $post = Post::create($request->all());
        
        // $post = Post::create([
            // 'title' => $request->title,
            // 'news_content' => $request->news_content,
            // 'author' => $request->author,
        //     'created_at' => $request->created_at ? date($request->created_at) : now(),
        // ]);
        // return response()->json(['data' => new PostDetailResource($post)], 201);
        return new PostDetailResource($post->loadMissing('writer:id,username'));
    }

    public function update(Request $request, $id)
    {
    //     $post = Post::findOrFail($id);
        $request->validate([
            'title' => 'required|string|max:255',
            'news_content' => 'required',
        ]);
    //     $post->update($request->all());
    //     return new PostDetailResource($post->loadMissing('writer:id,username'));
        $post = Post::findOrFail($id);
        $post->update($request->all());
        return new PostDetailResource($post->loadMissing('writer:id,username'));
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return new PostDetailResource($post->loadMissing('writer:id,username'));
    }
}
