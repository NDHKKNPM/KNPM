<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link rel="stylesheet" href="{{ asset('css/style.css') }}"> --}}

    @vite('resources/css/style.css')


    <title>Login/Register</title>
</head>
<body>
    <form class="login_register" action="" method="get">
        <div class="form-user">
            <label for="name">Enter your name</label>
            <input type="text" name="name" id="name" required/>
        </div>

        <div class="form-password">
            <label for="password">Enter your password</label>
            <input type="password" name="password" id="password" required/>
        </div>

    </form>
</body>
</html>
