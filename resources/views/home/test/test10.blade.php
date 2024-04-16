<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>上傳文件</title>
</head>
<body>
    <h1>上傳文件</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <p><input type="text" name="name" placeholder="姓名"/></p>
        <p><input type="number" name="age" placeholder="年齡" /></p>
        <p><input type="mail" name="email" placeholder="信箱"/></p>
        <p><input type="file" name="avatar" /></p>
        @csrf()
        <p><input type="submit" value="送出"/></p>
    </form>
</body>
</html>