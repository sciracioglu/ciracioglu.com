<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Yazi Olustur</title>
</head>
<body>
    <form method="POST" action="/yazi">
        @csrf
        <h1>Yazi Olusturun</h1>
        <div>
            <label for='title'>Baslik</label>
            <input type="text" name='title' placeholder="Baslik">
        </div>
        <div>
            <label for='description'>Yazi</label>
            <textarea name='description'></textarea>
        </div>
        <div>
            <label for='status'>Durum</label>
            <input type="radio" name='status' value="1"> Yayimla
            <input type="radio" name='status' value="0"> Taslak
        </div>
        <div>
            <button type="submit">Kaydet</button>
        </div>
    </form>
</body>
</html>