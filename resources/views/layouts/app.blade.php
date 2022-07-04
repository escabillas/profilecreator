<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Profile Creator</title>

    <link rel="icon" href="{{ asset('storage/profilecreator.png') }}">


    <!-- Bootstrap CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/mycss.css') }}">

    <!-- JS -->
    <script type="text/javascript" src="{{ asset('js/layouts/custstyle.js') }}"></script>

  </head>
  <body class="bg-gray-1 m-0">

    <nav class="navbar bg-gray-2 align-middle d-flex">
      <div class="container-fluid mx-5 justify-content-between">
        <a class="navbar-brand m-0 p-2" href="{{ route('home') }}">
          Profile Creator
        </a>
        <form class="search-form d-flex p-2" role="search" action="{{ route('search') }}" method="GET">
          <input class="search-form-input form-control me-2" type="search" name="query" placeholder="Search profile" aria-label="Search" value="{{ $_GET['query'] ?? '' }}"/>
          <button class="btn btn-outline-success btn-sm" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
</svg></button>
        </form>
          <ul class="d-flex m-0 p-2">
            @auth
              <li class="d-flex nav-item me-3">
                <a class="nav-link" href="{{ route('contact', ['user' => auth()->user() ]) }}">{{ auth()->user()->name }}</a>
              </li>
              <form action="{{ route('logout') }}" method="post">
                @csrf
                <button type="submit" class="border-0 bg-transparent p-0 nav-link">Logout</button>
              </form>
            @endauth
            @guest
              <li class="d-flex nav-item me-3">
                <a class="nav-link" href="{{ route('login') }}">Login</a>
              </li>
              <li class="d-flex nav-item">
                <a class="nav-link" href="{{ route('register') }}">Register</a>
              </li>
            @endguest
          </ul>
      </div>
    </nav>
    
    @yield('contents')

  </body>
</html>