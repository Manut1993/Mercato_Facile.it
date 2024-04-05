<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @vite(['resources/css/app.css','resources/js/app.js'])
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <title>{{ $title ?? 'Mercato facile' }}</title>
    </head>
    <body>
        <x-navbar/>
		<div class="flex flex-col md:flex-row bg-gray-50">
                <x-side-menu />
                <div class="w-full">
                    {{ $slot }}
            </div>
        </div>
        <x-footer/>
    </body>
</html>