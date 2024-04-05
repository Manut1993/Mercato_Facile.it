<div class="min-h-screen p-4 relative">

    @if ($showMessage)
        <div class="absolute top-0 p-2 bg-slate-200 text-slate-400 w-full">{{ $message }}</div>
    @endif

    <h1 class="fade-top text-slate-400 text-center text-4xl my-10">Controlla le tue notifiche</h1>

    <div class="text-right" x-data="{ markAsRead: false }">
        <i wire:click='markAsReadNotifications' @mouseenter="markAsRead = true" @mouseleave="markAsRead = false"
            :class="{'fa-envelope-open': markAsRead, 'fa-envelope': !markAsRead} "
            class="fa-solid fa-envelope text-2xl text-slate-400 relative cursor-pointer" data-tooltip-target='markAsRead'></i>
    </div>

    <div id="markAsRead" role="tooltip"
        class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
        Segna tutto come già letto
        <div class="tooltip-arrow" data-popper-arrow></div>
    </div>

    @if (isset($userNotifications))
        @foreach ($userNotifications as $key => $notification)
            <div class="bg-slate-200 p-4 rounded md:w-3/4 mx-auto flex justify-between my-10">
                <h2 class="text-slate-400">{{ $notification['message'] }}</h2>
                <div class="{{$notification['typeOfNotification']== 'revisor-request' ? 'block' : 'hidden'}}">
                    <button wire:click='acceptRevisor({{ $key }})'><i
                            class="fa-solid fa-check text-emerald-500 text-2xl mx-10"></i></button>
                    <button><i class="fa-regular fa-circle-xmark text-red-500 text-2xl"></i></button>
                </div>
            </div>
        @endforeach
    @else
        <h2 class="text-2xl text-slate-400">Nessuna notifica presente</h2>
    @endif
</div>
