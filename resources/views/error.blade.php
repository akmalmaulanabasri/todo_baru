<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    .tengah{
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100vw;
        height: 100vh;
        flex-direction: column;
    }
    .tengah img{
        display: block;
        width: 50%;
    }
    .button{
        padding: 10px 10px;
        background-color: #191919;
        color: #ffffff;
        text-decoration: none;
        border-radius: 3px;
    }
</style>
<body>
    <div class="tengah">
        <img src="https://cdn141.picsart.com/351249395014211.png" alt="">
        <h1>Anda tidak diperbolehkan mengakses halaman ini</h1>
        <a href="{{ route('dashboard') }}" class="button">Back to home</a>
    </div>
</body>
</html>