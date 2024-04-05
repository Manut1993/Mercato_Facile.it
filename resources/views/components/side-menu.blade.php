<div class="w-full md:w-1/12 bg-gray-50">
    <div id='sideMenu' class=" md:w-1/3 hover:w-full h-full bg-white transition-all duration-300">
        <ul class="flex items-center justify-between md:justify-normal md:block ms-2 pt-4">
            <li class="md:mb-10 relative">
                <a wire:navigate href="{{ route('dashboard.crea') }}">
                    <i
                        class="{{ request()->is('dashboard/crea') ? 'text-green-500' : '' }} fa-solid fa-plus ps-1 size-8 text-2xl hover:rotate-12 duration-300"></i>
                </a>
                <span class="absolute opacity-0 text-sm ps-1 text-gray-700 top-1">{{__('ui.nuovoAnnuncio')}}</span>
            </li>
            {{-- <li class="md:mb-10 relative"><i
                    class="fa-solid fa-dollar-sign text-2xl md:p-2 hover:rotate-12 duration-300"></i><span
                    class="absolute opacity-0 ps-1 text-sm text-gray-700 top-3">{{__('ui.vendite')}}</span></li> --}}
            {{-- <li class="md:mb-10 relative"><i
                    class="fa-solid fa-tag size-8 ps-1 text-2xl hover:rotate-12 duration-300"></i><span
                    class="absolute opacity-0 ps-1 text-sm text-gray-700 top-1">{{__('ui.acquisti')}}</span></li> --}}
            <li class="md:mb-10 relative">
                <a wire:navigate href="{{ route('dashboard.stats') }}"><i
                        class="{{ request()->is('dashboard/statistiche') ? 'text-green-500' : '' }} fa-solid ps-1 size-8 fa-chart-simple text-2xl hover:rotate-12 duration-300"></i></a>
                <span class="absolute opacity-0 ps-1 text-sm text-gray-700 top-1">{{__('ui.statistiche')}}</span>
            </li>

            <li class="md:mb-10 relative">
                <a wire:navigate
                    href="{{ Auth::user()->is_revisor ? route('dashboard.revisiona') : route('become.revisor') }}"><i
                        class="{{ request()->is('dashboard/revisiona') ? 'text-green-500' : '' }} fa-solid fa-user-tie ps-1 size-8 text-2xl hover:rotate-12 duration-300"></i></a>
                <span
                    class="absolute opacity-0 text-sm ps-1 text-gray-700 top-1">{{ Auth::user()->is_revisor ? 'revisiona annunci' : 'diventa revisore' }}</span>
            </li>

            <li class="md:mb-10 relative">
                <a wire:navigate href="{{ route('dashboard.notifications') }}"> 
                    <i class="{{ request()->is('dashboard/notifiche') ? 'text-green-500' : '' }} fa-solid fa-envelope ps-1 size-8 text-2xl hover:rotate-12 duration-300 relative">
                        <x-notification-badge/>
                    </i>
                </a>
                <span class="absolute opacity-0 text-sm ps-1 top-1">{{__('ui.leTueNotifiche')}}</span>
            </li>

            <li class="md:mb-10 relative md:hidden">
                <livewire:auth.logout />
            </li>
            {{-- <li class="md:mb-10 relative text-yellow-500"><i
                    class="fa-solid fa-face-grin-stars ps-1 size-8 text-2xl hover:rotate-12 duration-300"></i><span
                    class="absolute opacity-0 text-sm ps-1 top-1 text-yellow-500">{{__('ui.abbonamentoPremium')}}</span></li> --}}
        </ul>
    </div>
</div>
