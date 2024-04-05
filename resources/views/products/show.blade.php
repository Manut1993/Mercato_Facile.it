<x-layouts.app>
    <main class="flex justify-center bg-slate-100 py-10">
        <div class="p-4 rounded-lg bg-white w-full md:w-1/3 ">
            <div class="flex justify-between w-full">
                <div class="flex flex-col">
                    <h2>{{ $product->user->name }}</h2>
                    {{-- <div>
                        <i class="fa-regular fa-star hover:text-yellow-300"></i>
                        <i class="fa-regular fa-star hover:text-yellow-300"></i>
                        <i class="fa-regular fa-star hover:text-yellow-300"></i>
                        <i class="fa-regular fa-star hover:text-yellow-300"></i>
                        <i class="fa-regular fa-star hover:text-yellow-300"></i>
                    </div> --}}
                </div>
                {{-- <div class="flex gap-4">
                    <button class="p-2 bg-slate-100 rounded-full w-24"><i
                            class="fa-regular fa-heart text-xl"></i></button>
                    <button class="w-24 border border-emerald-300 rounded-full py-2">Chat</button>
                </div> --}}
            </div>
            @if ($product->images->count()>1)
                <x-carousel :images="$product->images"/>
            @else
                
                  {{-- src="{{!$product->images()->get()->isEmpty() ? $product->images()->first()->getUrl(400, 300) : 'http://picsum.photo/200'}}" alt="foto">  --}}
                  <img class="rounded-lg hover:scale-110 duration-300 w-full" src="{{isset($product->images->first()->path) ? $product->images->first()->getUrl(400, 300) : asset('images/product-placeholder.jpg') }}"
                  alt="">
            @endif
            <span class="text-4xl">{{ $product->price }} €</span>
            <h3 class="mt-4 text-3xl">{{ $product->object }}</h3>
            <span class="inline-block bg-slate-200 rounded-full p-1">{{ __('ui.'.$product->category->title)}}</span>
            <p class="mt-4 py-8 border-t-2 border-b-2 border-slate-100">{{ $product->about }}</p>
			<div class="rounded bg-green-200 flex text-green-500 p-8 items-center gap-4 mt-8">
				<i class="fa-solid fa-earth-americas text-3xl"></i>
				<p>{{ __('ui.fraseSostenibilita')}}</p>
			</div>
        </div>
    </main>
</x-layouts.app>
