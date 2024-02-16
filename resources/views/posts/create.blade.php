@extends('layout')

@section('content')
    <h1>Create post</h1>

    <form action="{{ route('posts.store') }}" method="post" novalidate enctype="multipart/form-data">
        @csrf
        @include('posts._form')

        <input type="submit" name="submit" value="Create">
    </form>
@endsection
