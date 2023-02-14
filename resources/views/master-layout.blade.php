<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset("css/main.css") }}">
    <link rel="icon" href="{{ asset('img/capitol_logoTitle.png') }}" type="image/icon type">
    <title>@yield('title')</title>


</head>

<body>

{{-- Navbar --}}
    <nav class="navbar navbar-expand-md navbar-light text-dark" style="background-color: #5fd1b8">
        <a href="/" class=" px-4 mx-4">
            <img src="{{ asset('img/capitol_logo.png') }}" alt="" class="img-responsive">
        </a>
        <div class="mt-1">
            <h6>Provincial Government of <span style="color: #ff7260;">Lanao del Sur</span> Database System</h6>
        </div>
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navMenu">
                <ul class="navbar-nav ms-auto">
                    @if (Session::has('loginId'))
                    <li class="nav-item h6 mb-0">
                        <a href="{{ '/' }}" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item h6 mb-0">
                        <a href="{{ route('tracking-admin') }}" class="nav-link">Tracking</a>
                    </li>
                    <li class="nav-item h6 mb-0">
                        <a href="{{ route('project-view') }}" class="nav-link">Projects</a>
                    </li>
                    <li class="nav-item h6 mb-0">
                        <a href="{{ route('profile') }}" class="nav-link">{{ $data->fname }}</a>
                    </li>
                    @else (Session::has('!loginId'))
                    <li class="nav-item h6 mb-0">
                        <a href="{{ '/' }}" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item h6 mb-0">
                        <a href="{{ route('tracking-guest') }}" class="nav-link">Tracking</a>
                    </li>
                    <li class="nav-item h6 mb-0">
                        <a href="{{ route('login') }}" class="nav-link">Login</a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    @yield('content')

    <footer class="text-center text-white fixed-bottom">

        <!-- Copyright -->
        <div class="text-center p-3 d-flex justify-content-center" style="background-color: #5fd1b8;">
           <p class="text-dark mb-0">Provincial Government of Lanao del Sur</p>
        </div>
        <!-- Copyright -->
        </footer>

          <!-- End of .container -->
</body>
</html>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
