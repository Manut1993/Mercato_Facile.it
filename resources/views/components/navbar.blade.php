<nav>
    <div class="flex justify-center gap-10">
        <div><x-language language="it" nation="it"/></div>
    
        <div><x-language language="en" nation="us"/></div>
    
        <div><x-language language="pt-br" nation="br"/></div>
    </div>
    <div class="flex p-6 gap-4 items-center">
        <div class="block">
            <a href="{{ route('homepage') }}"><img src="{{ asset('images/logo.png') }}" class="rounded-lg size-12 md:w-auto md:max-h-16"></a>
        </div>
        <livewire:search-bar />
        <div class="text-white items-center hidden md:flex">
            @auth
                <livewire:auth.logout />
            @endauth
            @guest
                <button class="main-color-2 rounded-full p-2 border border-emerald-300 me-4"><a
                        href="{{ route('register') }}">{{__('ui.login')}}</a></button>
            @endguest
            <button class="main-bg-color-2 rounded-full p-2"><a href="{{ route('dashboard.crea') }}"><i
                        class="fa-solid fa-plus me-2 border border-white rounded-full p-1"></i>{{__('ui.vendi')}}</a></button>
        </div>
    </div>
    <div class="grid grid-cols-5 md:grid-cols-10 bg-slate-50 border-t border-b p-2">
        @foreach ($categories as $category)
            <a class="text-slate-400 odd:hidden md:odd:block text-center" href="{{route('categoryShow',$category->id)}}">{{__('ui.' . $category->title)}}</a>
        @endforeach
    </div>
</nav>
