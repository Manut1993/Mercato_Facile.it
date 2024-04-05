<article class="rounded-lg text-slate-400 border relative">
    <a href="{{ route('show', $product->id) }}">
        
        <div class="overflow-y-scroll h-72">
            @foreach ($product->images as $image)
                @for ($i = 0; $i < count($images); $i++)
                    @if ($image->id == $images[$i]->id)
                        <div class="overflow-hidden rounded-lg">
                            <img class="rounded-lg hover:scale-110 duration-300"
                                src="{{ isset($product->images->first()->path) ? $image->getUrl(400, 300) : asset('images/product-placeholder.jpg') }}"
                                alt="">
                        </div>

                        <div class="flex justify-center my-6">
                            <span data-tooltip-target="{{'adult' . $image->id}}" class="{{ $image->adult }} mx-2"></span>
                            <div id="{{'adult' . $image->id}}" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                {{__('ui.adult')}}
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>

                            <span data-tooltip-target="{{'medical' . $image->id}}" class="{{ $image->medical }} mx-2"></span>
                            <div id="{{'medical' . $image->id}}" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                {{__('ui.medical')}}
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>

                            <span data-tooltip-target="{{'spoof' . $image->id}}" class="{{ $image->spoof }} mx-2"></span>
                            <div id="{{'spoof' . $image->id}}" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                {{__('ui.spoof')}}
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>

                            <span data-tooltip-target="{{'violence' . $image->id}}" class="{{ $image->violence }}  mx-2"></span>
                            <div id="{{'violence' . $image->id}}" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                {{__('ui.violence')}}
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>

                            <span data-tooltip-target="{{'racy' . $image->id}}" class="{{ $image->racy }} mx-2"></span>
                            <div id="{{'racy' . $image->id}}" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                {{__('ui.racy')}}
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </div>
                    @endif
                @endfor    
            @endforeach()
        </div>

        <div class="flex justify-between mt-2">
            <span class="font-bold">{{ $product->price ?? 'esempio' }}</span>
            <p>{{ __('ui.' . $product->category->title) ?? 'esempio' }}</p>
        </div>
        <h3 class="mt-2">{{ $product->object ?? 'esempio' }}</h3>
    </a>

    <div class="flex">
        <div class="flex-1">
            <button type="submit" wire:click='$parent.validateProduct({{ $product->id }})'
                class="group hover:bg-emerald-500 hover:first:text-white duration-300 rounded p-2 w-full"><i
                    class="fa-solid fa-check group-hover:text-white text-emerald-500 text-2xl mx-10"></i></button>
        </div>

        <div class="flex-1">
            <button wire:click='$parent.denyProduct({{ $product->id }})'
                class=" hover:bg-red-500 rounded group duration-300 flex-1 p-2 w-full"><i
                    class="fa-regular fa-circle-xmark group-hover:text-white text-red-500 text-2xl"></i></button>
        </div>
    </div>


</article>
