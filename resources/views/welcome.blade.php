<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>магеллан-сервис</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href=" {{asset('front/dist/css/main.css')}}">
        <link rel="stylesheet" href=" {{asset('front/bootstrap/dist/css/bootstrap.css')}}">
    </head>
    <body class="antialiased" >
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container-fluid">
                    <a class="navbar-top" href="#">МАГЕЛЛАН-СЕРВИС</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    </ul>
                    <div class="btn-top">
                    @if (Route::has('login'))

                    @auth
                    <button class="btn btn-outline-success" type="submit">
                    <a class="link-top" href="{{ url('/home') }}"> Главная</a>
                    </button>
                    @else
                        <button class="btn btn-outline-success" type="submit">
                            <a class="link-top" href="{{ route('login') }}"> вход</a>
                        </button>
                        @if (Route::has('register'))

                        <button class="btn btn-outline-success" type="submit">
                            <a class="link-top" href="{{ route('register') }}"> Регистрация</a>
                        </button>

                        @endif
                    @endauth

                    @endif
                    </div>

                    </div>
                </div>
            </nav>
        </div>
        <div class="container">
            <div class="text-top">
                <h1>МАГЕЛЛАН-СЕРВИС</h1>
                <h3>ПРОЙДИТЕ ПРОСТУЮ РЕГИСТРАЦИЮ</h3>
            </div>
        </div>
        <script src="{{asset('front/bootstrap/dist/js/bootstrap.js')}}" ></script>
    </body>
</html>
