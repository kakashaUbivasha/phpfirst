<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>
<div class="">
    <ul>
        <li><a href="{{route('post.index')}}">posts</a></li>
        <li><a href="{{route('book.index')}}">about</a></li>
    </ul>
</div>
@yield('content')
</body>
</html>
