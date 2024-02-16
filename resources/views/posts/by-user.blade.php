@extends('layout')

@section('content')
    <h1>Posts by {{ $user->username }}</h1>

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
        <a href="{{ route('user.posts', ['user' => $user, 'page' => $i]) }}"> {{ $i }}</a>
    @endfor
@endsection
