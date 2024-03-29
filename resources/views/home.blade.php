@extends('layout')

@section('content')
    <h1>Blog</h1>

    @foreach($posts as $post)
        @php
        /** @var \App\Models\Post $post */
        @endphp
        <article>
            <img src="{{ url('storage/' . $post->image_path) }}" alt="">
            <h2>{{ $post->title }}</h2>
            <p>{{ $post->content }}</p>
            <p><a href="{{ route('posts.show', $post) }}">Read all</a></p>
        </article>
    @endforeach

    @for($i = 1; $i <= ceil($posts->total() / $posts->perPage()); $i++)
        <a href="{{ route('home', ['page' => $i]) }}"> {{ $i }}</a>
    @endfor
@endsection
