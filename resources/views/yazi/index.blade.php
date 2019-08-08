<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Yazilar</title>
</head>
<body>
    <h1>Yazılar</h1>
    <ul>
        @forelse ($yazilar as $yazi)
            <li><a href="{{ $yazi->path()}}">{{ $yazi->title }}</a></li>
            @empty
            <li>Henüz yazı eklenmemiş</li>
        @endforelse
    </ul>
</body>
</html>