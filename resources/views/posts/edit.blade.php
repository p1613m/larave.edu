@extends('layout')

@section('content')
    <h1>Edit post</h1>

    <form action="{{ route('posts.update', $post) }}" method="post" novalidate enctype="multipart/form-data">
        @csrf
        @include('posts._form', [
            'post' => $post,
        ])

        <input type="submit" name="submit" value="Edit">
    </form>
@endsection
