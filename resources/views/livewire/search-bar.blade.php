<form wire:model.live='userInput' class="relative flex-grow flex items-center rounded-full border border-slate-300 p-3 text-slate-500">
        <i class="fa-solid fa-magnifying-glass pe-2"></i>
        <input type="text" class="remove-blu w-full border-none outline-none">
    
        @if ($searchResult != '')
            <div class="absolute left-0 top-[50px] w-full bg-slate-50 rounded z-10 p-2">
                @forelse ($searchResult as $result)
                    <a href="{{route('show',$result->id)}}" class="flex justify-between items-center rounded border bg-slate-100 p-2 hover:bg-slate-200 transition-colors duration-300">
                        <div>
                            <h2 class="font-bold">{{ $result->object }}</h2>
                            <p class="mt-4">{{ $result->about }}</p>
                        </div>
                        <span>{{ $result->price }}€</span>
                    </a>
                @empty
                    <div class="flex justify-between items-center rounded border bg-slate-100 p-2 hover:bg-slate-200 transition-colors duration-300">
                        <p class="font-bold">Nessun elemento trovato</p>
                    </div>
                @endforelse
            </div>
        @endif
 </form>    