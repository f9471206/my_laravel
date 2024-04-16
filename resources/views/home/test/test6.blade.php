<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{route('test7')}}" method="post">
        <input type="text" name="name" placeholder="姓名">
        <!-- <input type="hidden" name="_token" value={{csrf_token()}}> -->
        @csrf()
        <input type="submit" value="送出">
    </form>
</body>
</html>