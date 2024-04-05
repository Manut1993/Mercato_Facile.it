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
        
            <form action="{{route('register')}}" method="POST" class="zoom-in flex flex-col rounded-3xl bg-white p-8 w-full sm:w-[420px]">
                @csrf

                <div class="mb-2">
                    <a href="{{route('homepage')}}"><i class="fa-solid fa-house text-2xl"></i></a>
                </div>

                <div class="flex flex-col items-center justify-center">
                    <img class="w-28" src="/images/form-register.png" alt="">

                    <h1 class="text-center text-2xl w-60 mb-2">{{__('ui.fraseHRegister')}}</h1>

                    <p class="text-center opacity-60 w-80">
                        {{__('ui.frasePRegister')}}
                    </p>
                </div>

                <div class="relative flex flex-col my-6">
                    <input type="name" name="name" id="name" value="{{old('name')}}" class="peer h-12 w-full px-2 border-2 rounded border-gray-300 placeholder-transparent focus:outline-none focus:border-emerald-400 @error('name') border-red-600 focus:border-red-300 @enderror" placeholder=" ">
                    <label for="name" class="absolute left-2 -top-3.5 text-gray-600 text-xs peer-placeholder-shown:text-base peer-placeholder-shown:top-2.5 peer-focus:-top-4 peer-focus:text-xs peer-focus:text-emerald-500 transition-all @error('name') peer-focus:text-red-400 @enderror">{{__('ui.nome')}}</label>
                
                    @error('name')
                        <span class="text-red-500">{{$message}}</span>
                    @enderror
                </div>

                <div class="relative flex flex-col mb-6">
                    <input type="email" name="email" id="email" value="{{old('email')}}" class="peer h-12 w-full px-2 border-2 rounded border-gray-300 placeholder-transparent focus:outline-none focus:border-emerald-400 @error('email') border-red-600 focus:border-red-300 @enderror" placeholder=" ">
                    <label for="email" class="absolute left-2 -top-3.5 text-gray-600 text-xs peer-placeholder-shown:text-base peer-placeholder-shown:top-2.5 peer-focus:-top-4 peer-focus:text-xs peer-focus:text-emerald-500 transition-all @error('email') peer-focus:text-red-400 @enderror">{{__('ui.email')}}</label>
                
                    @error('email')
                        <span class="text-red-500">{{$message}}</span>
                    @enderror
                </div>

                <div class="relative flex flex-col mb-6">
                    <input type="password" name="password" id="password" class="peer h-12 w-full px-2 border-2 rounded border-gray-300 placeholder-transparent focus:outline-none focus:border-emerald-400 @error('password') border-red-600 focus:border-red-300 @enderror" placeholder=" ">
                    <label for="password" class="absolute left-2 -top-3.5 text-gray-600 text-xs peer-placeholder-shown:text-base peer-placeholder-shown:top-2.5 peer-focus:-top-4 peer-focus:text-xs peer-focus:text-emerald-500 transition-all @error('password') peer-focus:text-red-400 @enderror">{{__('ui.password')}}</label>
                
                    @error('password')
                        <span class="text-red-500">{{$message}}</span>
                    @enderror
                </div>

                <div class="relative flex flex-col mb-6">
                    <input type="password" name="password_confirmation" id="password_confirmation" value="{{old('password_confirmation')}}" class="peer h-12 w-full px-2 border-2 rounded border-gray-300 placeholder-transparent focus:outline-none focus:border-emerald-400 @error('password_confirmation') border-red-600 focus:border-red-300 @enderror" placeholder=" ">
                    <label for="password_confirmation" class="absolute left-2 -top-3.5 text-gray-600 text-xs peer-placeholder-shown:text-base peer-placeholder-shown:top-2.5 peer-focus:-top-4 peer-focus:text-xs peer-focus:text-emerald-500 transition-all @error('password_confirmation') peer-focus:text-red-400 @enderror">{{__('ui.passwordConferm')}}</label>
                
                    @error('password_confirmation')
                        <span class="text-red-500">{{$message}}</span>
                    @enderror
                </div>

                <div class="text-center mb-6">
                    <button type="submit" class="bg-emerald-400 py-2 px-20 rounded-full hover:bg-emerald-200 transition-all">{{__('ui.registrati')}}</button>
                </div>

                <div class="flex justify-center items-center mb-6">
                        <hr class="border border-emerald-300 w-2/6">

                        <span class="w-2/6 text-center">{{__('ui.accediCon')}}</span>

                        <hr class="border border-emerald-300 w-2/6">
                </div>

                <div class="text-center mb-6">
                    <a href="{{route('social.login', ['provider' => 'google'])}}" class="border border-emerald-500 hover:bg-emerald-200 font-medium rounded-full text-sm px-10 py-2 text-center inline-flex items-center dark:focus:ring-[#4285F4]/55 mr-2 mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path fill="#4285F4" fill-rule="evenodd" d="M21.6 12.227c0-.709-.064-1.39-.182-2.045H12v3.868h5.382a4.6 4.6 0 0 1-1.996 3.018l3.232 2.51c1.891-1.742 2.982-4.305 2.982-7.35Z" clip-rule="evenodd"></path><path fill="#34A853" fill-rule="evenodd" d="M12 22c2.7 0 4.964-.895 6.618-2.423l-3.232-2.509c-.895.6-2.04.955-3.386.955-2.605 0-4.81-1.76-5.595-4.123l-3.341 2.59A9.996 9.996 0 0 0 12 22Z" clip-rule="evenodd"></path><path fill="#FBBC05" fill-rule="evenodd" d="M6.405 13.9c-.2-.6-.314-1.24-.314-1.9 0-.66.114-1.3.314-1.9L3.064 7.51A9.996 9.996 0 0 0 2 12c0 1.614.386 3.14 1.064 4.49l3.34-2.59Z" clip-rule="evenodd"></path><path fill="#EA4335" fill-rule="evenodd" d="M12 5.977c1.468 0 2.786.505 3.823 1.496l2.868-2.868C16.959 2.99 14.696 2 12 2 8.09 2 4.71 4.24 3.064 7.51l3.34 2.59C7.192 7.736 9.396 5.977 12 5.977Z" clip-rule="evenodd"></path></svg>
                        <div class="ps-1">Google</div>
                    </a>

                    <a href="{{route('social.login', ['provider' => 'facebook'])}}" class="border border-emerald-500 hover:bg-emerald-200 font-medium rounded-full text-sm px-8 py-2 text-center inline-flex items-center dark:focus:ring-[#4285F4]/55 mr-2 mb-2">
                        <svg fill="#0084ff" height="24" width="24" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 310 310" xml:space="preserve" stroke="#0084ff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="XMLID_834_"> <path id="XMLID_835_" d="M81.703,165.106h33.981V305c0,2.762,2.238,5,5,5h57.616c2.762,0,5-2.238,5-5V165.765h39.064 c2.54,0,4.677-1.906,4.967-4.429l5.933-51.502c0.163-1.417-0.286-2.836-1.234-3.899c-0.949-1.064-2.307-1.673-3.732-1.673h-44.996 V71.978c0-9.732,5.24-14.667,15.576-14.667c1.473,0,29.42,0,29.42,0c2.762,0,5-2.239,5-5V5.037c0-2.762-2.238-5-5-5h-40.545 C187.467,0.023,186.832,0,185.896,0c-7.035,0-31.488,1.381-50.804,19.151c-21.402,19.692-18.427,43.27-17.716,47.358v37.752H81.703 c-2.762,0-5,2.238-5,5v50.844C76.703,162.867,78.941,165.106,81.703,165.106z"></path> </g> </g></svg>
                        <div class="ps-1">Facebook</div>       
                    </a>

                    <a href="{{route('social.login', ['provider' => 'github'])}}" class="border border-emerald-500 hover:bg-emerald-200 font-medium rounded-full text-sm px-10 py-2 text-center inline-flex items-center dark:focus:ring-[#4285F4]/55 mr-2 mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" preserveAspectRatio="xMinYMin meet" viewBox="0 0 256 249" id="github"><g fill="#161614"><path d="M127.505 0C57.095 0 0 57.085 0 127.505c0 56.336 36.534 104.13 87.196 120.99 6.372 1.18 8.712-2.766 8.712-6.134 0-3.04-.119-13.085-.173-23.739-35.473 7.713-42.958-15.044-42.958-15.044-5.8-14.738-14.157-18.656-14.157-18.656-11.568-7.914.872-7.752.872-7.752 12.804.9 19.546 13.14 19.546 13.14 11.372 19.493 29.828 13.857 37.104 10.6 1.144-8.242 4.449-13.866 8.095-17.05-28.32-3.225-58.092-14.158-58.092-63.014 0-13.92 4.981-25.295 13.138-34.224-1.324-3.212-5.688-16.18 1.235-33.743 0 0 10.707-3.427 35.073 13.07 10.17-2.826 21.078-4.242 31.914-4.29 10.836.048 21.752 1.464 31.942 4.29 24.337-16.497 35.029-13.07 35.029-13.07 6.94 17.563 2.574 30.531 1.25 33.743 8.175 8.929 13.122 20.303 13.122 34.224 0 48.972-29.828 59.756-58.22 62.912 4.573 3.957 8.648 11.717 8.648 23.612 0 17.06-.148 30.791-.148 34.991 0 3.393 2.295 7.369 8.759 6.117 50.634-16.879 87.122-64.656 87.122-120.973C255.009 57.085 197.922 0 127.505 0"></path><path d="M47.755 181.634c-.28.633-1.278.823-2.185.389-.925-.416-1.445-1.28-1.145-1.916.275-.652 1.273-.834 2.196-.396.927.415 1.455 1.287 1.134 1.923M54.027 187.23c-.608.564-1.797.302-2.604-.589-.834-.889-.99-2.077-.373-2.65.627-.563 1.78-.3 2.616.59.834.899.996 2.08.36 2.65M58.33 194.39c-.782.543-2.06.034-2.849-1.1-.781-1.133-.781-2.493.017-3.038.792-.545 2.05-.055 2.85 1.07.78 1.153.78 2.513-.019 3.069M65.606 202.683c-.699.77-2.187.564-3.277-.488-1.114-1.028-1.425-2.487-.724-3.258.707-.772 2.204-.555 3.302.488 1.107 1.026 1.445 2.496.7 3.258M75.01 205.483c-.307.998-1.741 1.452-3.185 1.028-1.442-.437-2.386-1.607-2.095-2.616.3-1.005 1.74-1.478 3.195-1.024 1.44.435 2.386 1.596 2.086 2.612M85.714 206.67c.036 1.052-1.189 1.924-2.705 1.943-1.525.033-2.758-.818-2.774-1.852 0-1.062 1.197-1.926 2.721-1.951 1.516-.03 2.758.815 2.758 1.86M96.228 206.267c.182 1.026-.872 2.08-2.377 2.36-1.48.27-2.85-.363-3.039-1.38-.184-1.052.89-2.105 2.367-2.378 1.508-.262 2.857.355 3.049 1.398"></path></g></svg>
                        <div class="ps-1">GitHub</div> 
                    </a>
                </div>

                <div class="text-center">
                    <h2>{{__('ui.haiGiaUnAccount')}}<a href="{{route('login')}}" class="text-emerald-500">{{__('ui.accedi')}}</a></h2>
                </div>
            </form>

        </div>

    </body>
</html>