<?php
$los = ["Truvk", "Vuan", "Vua"];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hello</title>
</head>
<body>
    Hello World <br/>
    @foreach ($los as $lo)
        Hi, {{$lo}} <br>
    @endforeach
</body>
</html>
