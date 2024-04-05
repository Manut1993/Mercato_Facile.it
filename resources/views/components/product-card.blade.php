<article class="rounded-lg text-slate-400 bg-slate-100 p-3">
    <a href="{{ route('show', $product->id) }}">
        <div class="overflow-hidden rounded-lg max-h-48">
            <img class="rounded-lg hover:scale-110 duration-300 min-h-full" src="{{isset($product->images->first()->path) ? $product->images->first()->getUrl(400,300) : asset('images/product-placeholder.jpg') }}"
                alt="">
        </div>
        <div class="flex justify-between mt-2 p-2">
            <span class="font-bold">{{ $product->price ?? 'esempio' }} €</span>
            <p>{{__('ui.' . $product->category->title) ?? 'esempio' }}</p>
        </div>
        <h3 class="mt-2 p-2">{{ $product->object ?? 'esempio' }}</h3>
        <div class="flex text-purple-500 mt-2 items-center">
            <i class="fa-solid fa-truck-fast p-2"></i>
            <span class="text-sm ms-2">{{__('ui.spedizione')}}</span>
        </div>
    </a>
</article>
