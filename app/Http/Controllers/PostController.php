<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Http\UploadedFile;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Create Post';
        return view('posts.edit', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'status' => ($request->status) ? $request->status : 0,
            'image' => $request->file('image')->getClientOriginalName()
        ]);
        $validated = $request->validated();
        $request->image->storeAs('public', $post['image']);
        $post->save();
        return redirect('/posts');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $title = "Edit post";
        return view('posts.edit', compact('post', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'status' => ($request->status) ? $request->status : 0,
            'image' => $request->file('image')->getClientOriginalName()
        ]);
        $validated = $request->validated();
        $request->image->storeAs('public', $post['image']);
        $post->save();
        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        Storage::delete($post->image);
        $post->delete();
        return redirect()->route('posts.index');
    }
}
