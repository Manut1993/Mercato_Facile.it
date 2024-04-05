<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @vite(['resources/css/app.css','resources/js/app.js'])
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <title>{{ $title ?? 'Mercato facile' }}</title>
    </head>
    <body>
        
        <div class="min-h-screen w-full flex flex-col items-center justify-center bg-gradient-to-tr from-emerald-500 to-emerald-200 p-3">
        
            <form action="{{route('login')}}" method="POST" class="zoom-in flex flex-col rounded-3xl bg-white p-8 w-full sm:w-[420px]">
                @csrf

                <div class="mb-2">
                    <a href="{{route('homepage')}}"><i class="fa-solid fa-house text-2xl"></i></a>
                </div>
                <div class="flex justify-center">
                    <h1 class="text-center text-2xl">{{__('ui.benvenuto')}}</h1>
                </div>

                <div class="relative flex flex-col my-8">
                    <input type="email" name="email" id="email" value="{{old('email')}}" class="peer h-12 w-full px-2 border-2 rounded border-gray-300 placeholder-transparent focus:outline-none focus:border-emerald-400 @error('email') border-red-600 focus:border-red-300 @enderror" placeholder=" ">
                    <label for="email" class="absolute left-2 -top-3.5 text-gray-600 text-xs peer-placeholder-shown:text-base peer-placeholder-shown:top-2.5 peer-focus:-top-4 peer-focus:text-xs peer-focus:text-emerald-500 transition-all @error('email') peer-focus:text-red-400 @enderror">{{__('ui.email')}}</label>
                
                    @error('email')
                        <span class="text-red-500">{{$message}}</span>
                    @enderror
                </div>

                <div class="relative flex flex-col mb-8">
                    <input type="password" name="password" id="password" class="peer h-12 w-full px-2 border-2 rounded border-gray-300 placeholder-transparent focus:outline-none focus:border-emerald-400 @error('password') border-red-600 focus:border-red-300 @enderror" placeholder=" ">
                    <label for="password" class="absolute left-2 -top-3.5 text-gray-600 text-xs peer-placeholder-shown:text-base peer-placeholder-shown:top-2.5 peer-focus:-top-4 peer-focus:text-xs peer-focus:text-emerald-500 transition-all @error('password') peer-focus:text-red-400 @enderror">{{__('ui.password')}}</label>
                
                    @error('password')
                        <span class="text-red-500">{{$message}}</span>
                    @enderror
                </div>

                <div class="mb-8">
                    <label for="remember_me" class="inline-flex items-center">
                        <input type="checkbox" id="remember_me" name="remember" class="rounded border-gray-300 text-emerald-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" {{ old('remember') ? 'checked' : '' }}>
                        <span class="ml-2 text-sm text-gray-600">{{__('ui.rememberMe')}}</span>
                    </label>
                </div>

                <div class="text-center mb-8">
                    <button type="submit" class="bg-emerald-400 py-2 px-10 rounded-full hover:bg-emerald-200 transition-all">{{__('ui.acessoAlMercatoFacile')}}</button>
                </div>

                <div class="text-center">
                    <h2>{{__('ui.nonHaiUnaccount')}}<a href="{{route('register')}}" class="text-emerald-500">{{__('ui.registrati')}}</a></h2>
                </div>
            </form>

        </div>

    </body>
</html>