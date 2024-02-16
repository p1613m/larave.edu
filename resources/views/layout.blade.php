<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog</title>
    <link rel="stylesheet" href="{{ url('/assets/style.css') }}">
</head>
<body>

<nav>
    <a href="{{ route('home')  }}">Home</a>

    @auth
        <a href="{{ route('posts.create') }}">Create post</a>
        <a href="{{ route('logout') }}">Logout</a>
    @endauth

    @guest
        <a href="{{ route('login') }}">Login</a>
        <a href="{{ route('registration')  }}">Registration</a>
    @endguest
</nav>

@yield('content')

<footer>
    &copy; 2024 my blog
</footer>
</body>
</html>
