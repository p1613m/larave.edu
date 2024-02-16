<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function create()
    {
        return view('posts.create');
    }

    public function store(PostRequest $request)
    {
        /** @var Post $post */
        $post = Auth::user()->posts()->create($request->validated());
        $post->updateImage($request->file('image'));

        return redirect()->route('home');
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post,
        ]);
    }

    public function delete(Post $post)
    {
        $post->delete();

        return redirect()->route('home');
    }

    public function edit(Post $post)
    {
        return view('posts.edit', [
            'post' => $post,
        ]);
    }
    public function update(Post $post, PostRequest $request)
    {
        $post->update($request->validated());
        $post->updateImage($request->file('image'));

        return redirect()->route('posts.show', $post);
    }

    public function userPosts(User $user)
    {
        return view('posts.by-user', [
            'user' => $user,
            'posts' => $user->posts()->paginate(2),
        ]);
    }
}
