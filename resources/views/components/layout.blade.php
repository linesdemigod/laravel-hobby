<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <title>Hobby | @yield('title')</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-danger">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                @guest
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                    </ul>
                @endguest
                @auth

                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('hobby') }}">Hobby</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('changepassword') }}">Change password</a>
                        </li>
                        @if (Auth::user()->role == '1')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('posty') }}">Admin</a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <input type="submit" class="nav-link bg-danger border border-0" value="Logout">
                            </form>
                        </li>
                    </ul>
                @endauth
            </div>
        </div>
    </nav>
    <main>
        @yield('content')
    </main>
    <footer>

        <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    </footer>
</body>

</html>
