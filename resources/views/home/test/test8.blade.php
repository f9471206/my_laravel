<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/home/test/test8" method="post">
        <p>姓名:<input type="text" name="name"></p>
        <p>年齡:<input type="number" name="age"></p>
        <p>年齡:<input type="mail" name="email"></p>
        @csrf()
        <input type="submit" value="送出">
    </form>
</body>
</html>