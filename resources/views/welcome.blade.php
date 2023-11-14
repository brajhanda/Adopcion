<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Adoptame</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <style>

        body {
            font-family: Helvetica, Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

          .right-top {
            position: absolute;
            top: 0;
            right: 0;
         }

         .right-top > a {
            margin-right: 1rem;
         }
         
        </style>

    </head>
    <body class="antialiased">
    <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 selection:bg-red-500 selection:text-white">
    @if (Route::has('login'))
        <div class="sm:fixed right-top p-6 text-right z-10">
            <br>
            @auth
                <a href="{{ url('/Inicio') }}" class="">Inicio</a>
            @else
                <a href="{{ route('login') }}" class="" style=" cursor: pointer; background-color: #fff;border: 2px solid #000000;border-radius: 10px;padding: 10px 10px;font-size: 16px;color: #000000;color: #000;font-size: 1.2rem;text-decoration: none;">Iniciar sesión</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="" style=" cursor: pointer; background-color: #fff;border: 2px solid #000000;border-radius: 10px;padding: 10px 10px;font-size: 16px;color: #000000;color: #000;font-size: 1.2rem;text-decoration: none;">Registrarse</a>
                @endif
            @endauth
        </div>
    @endif
</div>
<img src="img/FondoHome.jpg" width="100%">
    </body>
</html>
