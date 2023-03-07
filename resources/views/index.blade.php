<!DOCTYPE html>
<html lang="en">
<head>
    <title>Laravel is the best!</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: IBM Plex Sans, sans-serif;
        }
        body {
            text-align: center;
        }
        .center-div {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
    </style>
</head>
<body style="background-color: #1a202c">
    <div class="center-div">
        <h1 style="margin-bottom: 10px;color: white">{{$framework}} is the best!</h1>
        <img src="{{asset('laravel.png')}}" style="width: 10vh" alt="">
    </div>
</body>
</html>
