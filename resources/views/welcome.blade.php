<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Email Verification</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
        {{-- VUE CDN --}}
        <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>
    </head>
    <style>
        .main-container {
            flex: 1;
        }
        body{
            height: 100vh;
            display: flex;
            flex-direction: column;
        }
    </style>
    <body>
        <nav class="navbar navbar-light d-flex justify-content-end" style="background-color:#663399">
            <ul class="nav justify-content-end">
                
                @if(session('email'))
                    <li class="nav-item">
                        <a class="nav-link rounded-pill bg-light px-3 py-2 mx-2 text-dark" href="{{ route('logout') }}">Logout</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link rounded-pill bg-light px-3 py-2 mx-2 text-dark" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link rounded-pill bg-light px-3 py-2 mx-2 text-dark" href="{{ route('apply') }}">Apply</a>
                    </li>
                @endif
            </ul>
        </nav>
        
        <div class="main-container">
            @yield('content')
        </div>
        
        
        <div class="w-100 d-flex flex-row justify-content-evenly text-light align-items-center" style="background-color:#663399">
            <p class="mb-0 py-2">New York</p>
            <p class="mb-0">Contact Us</p>
        </div>
    </body>
</html>
