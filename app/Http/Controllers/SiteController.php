<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        $posts = Post::query()->paginate(2);

        return view('home', [
            'posts' => $posts,
        ]);
    }
}
