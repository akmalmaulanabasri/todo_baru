<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Todo App</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-2 text-light">
        <div class="container">
            <a class="navbar-brand text-light active mx-2" href="{{ route('dashboard') }}">TODO APP</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto align-items-center">
                    @if (Auth::user()->role == 'user')
                        <li class="nav-item">
                            <a href="{{ route('dashboard') }}" class="nav-link active text-light">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('add') }}" class="nav-link active text-light">Create Todo</a>
                        </li>
                    @endif
                    @if (Auth::user()->role == 'admin')
                        <li class="nav-item">
                            <a href="{{ route('dashboard.users') }}" class="nav-link active text-light">Users</a>
                        </li>
                    @endif
                    <li class="nav-item dropdown">
                        <a class="nav-link text-light dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            @if (Auth::user()->image_profile == null)
                                <img src="https://www.pngarts.com/files/10/Default-Profile-Picture-Transparent-Images.png"
                                    alt="" class="img-fluid small" width="30" height="24">
                            @else
                                <img src="{{ asset('storage') }}/{{ Auth::user()->image_profile }}" alt=""
                                    class="img-fluid small" width="30" height="24">
                            @endif
                            Hello, {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="{{ route('dashboard.profile') }}">Profile</a></li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    @yield('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>
