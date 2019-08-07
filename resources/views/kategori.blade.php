<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kategoriler</title>
</head>
<body>
    @foreach ($kategoriler as $kategori)
        <li>{{ $kategori->title }}</li>
    @endforeach
</body>
</html>