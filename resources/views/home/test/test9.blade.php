<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
@if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
@endif
    <h1>自動驗證</h1>
    <form action="" method="post">
        <p>姓名:<input type="text" name="name"></p>
        <p>年齡:<input type="number" name="age"></p>
        <p>年齡:<input type="mail" name="email"></p>
        @csrf()
        <input type="submit" value="送出">
    </form>
</body>
</html>