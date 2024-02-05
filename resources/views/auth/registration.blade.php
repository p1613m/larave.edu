@extends('layout')

@section('content')
    <h1>Registration</h1>

    <form action="{{ route('registration.action') }}" method="post" novalidate>
        @csrf
        <label>
            Name:<br>
            <input type="text" name="username" value="{{ old('username') }}"><br>
            @error('username') {{ $message }}<br> @enderror
        </label>
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
        <label>
            Password confirm:<br>
            <input type="password" name="password_confirmation"><br>
        </label>
        <input type="submit" value="Registration">
    </form>
@endsection
