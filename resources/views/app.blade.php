<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>Минимизатор URL</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body class="antialiased">
        <div id="app">
            <nav class="bg-gray-400 mt-0 relative z-10">
                <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
                <div class="relative flex items-center justify-between h-16">
                    <div class="flex items-center justify-center sm:items-stretch sm:justify-start">
                        <a href="/" class="font-bold"> Минимизатор URL </a>
                    </div>
                </div>
                </div>
            </nav>

            <div class="relative z-0 flex -mt-16 h-screen justify-center bg-gray-100 dark:bg-gray-900 items-center">
                <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                    <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg p-6">
                        <app-component :page="`{{ $page }}`" :id="{{ isset($id) ? $id : 0 }}" />
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
