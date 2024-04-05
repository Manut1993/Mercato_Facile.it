<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @vite(['resources/css/app.css','resources/js/app.js'])
        
        <title>{{ $title ?? 'Mercato facile' }}</title>
    </head>
    <body>
        
		<div class="flex bg-gray-50">
            <div class="flex flex-col items-center justify-center w-full bg-gray-50 h-full">
                <div class="w-full lg:w-3/4">
                        {{ $slot }}
                </div>
            </div>
        </div>

    </body>
</html>