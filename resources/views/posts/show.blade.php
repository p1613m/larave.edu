@php use Illuminate\Support\Facades\Auth; @endphp
@extends('layout')

@section('content')
    <h1>{{ $post->title }}</h1>
    <article>
        <img src="{{ url('storage/' . $post->image_path) }}" alt=""><br>
        <a href="{{ route('user.posts', $post->user) }}">{{ $post->user->username }}</a>
        <p>{{ $post->content }}</p>
    </article>

    @if (Auth::user() && Auth::user()->id == $post->user_id)
        <a href="{{ route('posts.delete', $post) }}">Delete</a>
        <a href="{{ route('posts.edit', $post) }}">Edit</a>
    @endif
@endsection
