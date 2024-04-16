<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>分頁</title>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<body>
<input type="button" value="送出" id="btn">
</body>

<script type="text/javascript">
 $(function(){
    $('#btn').click(function(){
        $.get('/home/test/test17',function(data){
            console.log(data);
        },'json');
    });
 });
</script>

</html>