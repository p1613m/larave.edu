@extends('layout')

@section('content')
    <h1>Login</h1>

    <form action="{{ route('login.action') }}" method="post" novalidate>
        @csrf
        <label>
            Email:<br>
            <input type="email" name="email" value="{{ old('email') }}"><br>
            @error('email') {{ $message }}<br> @enderror
        </label>
        <label>
            Password:<br>
            <input type="password" name="password"><br>
            @error('password') {{ $message }}<br> @enderror
        </label>
        <input type="submit" value="Login">
    </form>
@endsection
