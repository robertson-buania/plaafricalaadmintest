<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Admin --- PlaafricaLaw</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <script src="{{ asset('js/app.js') }}" defer></script>

    </head>
    <body style="background-color: rgba(199, 174, 255, 0.062)">
        <div style="margin-top: 10rem;margin-bottom: 1.5rem; padding: 15px; ">
            <div  style="display: flex;align-items: center; justify-content: center;flex-direction: column">
                <a href="/">
                    <img  style="border-radius: 10px;width:100px;heigth:100px; color:gray;margin-bottom: 25px;" src="{{asset('assets/img/PlaLogo.ico')}}" alt="" srcset="">

                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
