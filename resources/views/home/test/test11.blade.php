<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>分頁</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>姓名</th>
                <th>年齡</th>
                <th>信箱</th>
                <th>頭像</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $val)
            <tr>
                <td>{{$val->id}}</td>
                <td>{{$val->name}}</td>
                <td>{{$val->age}}</td>
                <td>{{$val->email}}</td>

                <td><img src="/uploads/{{$val->avatar}}" width="150px" alt=""></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$data->links()}}

</body>
</html>