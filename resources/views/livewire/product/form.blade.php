<div>
    @if (session('success'))
        <div class="bg-green-100 border mt-4 border-green-400 text-green-700 px-4 flex items-center">
            <i class="fa-solid fa-check text-xl"></i>
            <p class="px-4 py-3 rounded-md my-2" role="alert">
                {{ session('success') }} </p>
        </div>
    @endif
    @if (session('message'))
        <div class="bg-green-100 border mt-4 border-green-400 text-green-700 px-4 flex items-center">
            <i class="fa-solid fa-check text-xl"></i>
            <p class="px-4 py-3 rounded-md my-2" role="alert">
                {{ session('message') }} </p>
        </div>
    @endif
    <h1 class="fade-top text-center my-8 text-4xl">{{ __('ui.ciao') }} {{ Auth::user()->name }},
        {{ __('ui.fraseHForm') }}</h1>
    <form wire:submit.prevent='store' enctype="multipart/form-data" class="flex flex-col items-center my-8">

        @csrf

        <!--select category-->
        <div class="fade-right bg-white p-4 rounded-md md:w-2/4 xl:w-2/5">
            <h2 class="text-xl">{{ __('ui.selezionaCategoria') }}</h2>
            <div class="relative flex flex-col mb-8 w-full mt-8">
                <select wire:model="category_id" type="text" id="category"
                    class="peer h-10 w-full border rounded placeholder-transparent focus:outline-none focus:border-emerald-400 @error('category') border-red-600 focus:border-red-300 @enderror"
                    placeholder=" ">
                    <option value=""></option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ __('ui.' . $category->title) }}</option>
                    @endforeach
                </select>
                <label for="category"
                    class="absolute left-2 -top-3.5 text-gray-600 text-xs peer-placeholder-shown:text-base peer-placeholder-shown:top-2.5 peer-focus:-top-3.5 peer-focus:text-xs peer-focus:text-emerald-500 transition-all @error('category') peer-focus:text-red-400 @enderror">{{ __('ui.categoria') }}</label>

                @error('category_id')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <p class="mt-4 text-gray-600 text-sm">{{ __('ui.commentoCategoria') }}</p>
        </div>
        <!--fine select category-->

        <!--input object-->
        <div class="fade-left w-5/6 p-4 md:w-2/4 xl:w-2/5 mt-12 rounded-md bg-white">
            <h2 class="text-xl">{{ __('ui.oggettoDaVendere') }}</h2>
            <div class="relative flex flex-col mb-8 mt-8">
                <input wire:model="object" type="text" id="object"
                    class="peer h-10 w-full border rounded border-gray-300 placeholder-transparent focus:outline-none focus:border-emerald-400 @error('object') border-red-600 focus:border-red-300 @enderror"
                    placeholder=" ">
                <label for="object"
                    class="absolute left-2 -top-3.5 text-gray-600 text-xs peer-placeholder-shown:text-base peer-placeholder-shown:top-2.5 peer-focus:-top-3.5 peer-focus:text-xs peer-focus:text-emerald-500 transition-all @error('object') peer-focus:text-red-400 @enderror">{{ __('ui.oggetto') }}</label>

                @error('object')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <p class="text-sm text-gray-600 mt-4">{{ __('ui.commentoOggetto') }}</p>
        </div>
        <!--fine input object-->

        <!--input price-->
        <div class="fade-right w-5/6 p-4 md:w-2/4 xl:w-2/5 mt-12 rounded-md bg-white">
            <h2 class="text-xl">{{ __('ui.prezzoAnnuncio') }}</h2>
            <div class="relative flex flex-col mb-8 w-full mt-8">
                <input wire:model="price" type="text" id="price"
                    class="peer h-10 w-full border rounded border-gray-300 placeholder-transparent focus:outline-none focus:border-emerald-400 @error('price') border-red-600 focus:border-red-300 @enderror"
                    placeholder=" ">
                <label for="price"
                    class="absolute left-2 -top-3.5 text-gray-600 text-xs peer-placeholder-shown:text-base peer-placeholder-shown:top-2.5 peer-focus:-top-3.5 peer-focus:text-xs peer-focus:text-emerald-500 transition-all @error('price') peer-focus:text-red-400 @enderror">{{ __('ui.prezzo') }}</label>

                @error('price')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <p class="text-sm text-gray-600 mt-4">{{ __('ui.commentoPrezzo') }}</p>
        </div>
        <!--fine input price-->

        <!--input about-->
        <div class="fade-left w-5/6 p-4 md:w-2/4 xl:w-2/5 mt-12 rounded-md bg-white">
            <h2 class="text-xl">{{ __('ui.descrizioneAnnnucio') }}</h2>
            <div class="relative flex flex-col mb-8 w-full mt-8">
                <textarea wire:model="about" type="text" id="about" rows="5"
                    class="peer w-full border-2 rounded border-gray-300 placeholder-transparent focus:outline-none focus:border-emerald-400 @error('about') border-red-600 focus:border-red-300 @enderror"
                    placeholder=" "></textarea>
                <label for="about"
                    class="absolute left-2 -top-3.5 text-gray-600 text-xs peer-placeholder-shown:text-base peer-placeholder-shown:top-2.5 peer-focus:-top-3.5 peer-focus:text-xs peer-focus:text-emerald-500 transition-all @error('about') peer-focus:text-red-400 @enderror">{{ __('ui.descrizione') }}</label>

                <p class="text-gray-600 text-sm mt-4">
                    {{ __('ui.commentoDescrizione') }}
                </p>

                @error('about')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <!--fine input about-->

        <!--upload file-->
        <div class="col-span-full w-5/6 md:w-2/4 xl:w-2/5 mt-8">
            <label for="cover-photo"
                class="block text-center font-medium leading-6 text-gray-600">{{ __('ui.caricaImagine') }}</label>

            <div id="drop-area"
                class="mt-2 flex justify-center bg-white rounded-lg border border-dashed border-gray-900/25 px-6 py-10 w-full">
                <div class="text-center">
                    @if (!count($images))
                        <svg id="svg-image" class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24"
                            fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z"
                                clip-rule="evenodd" />
                        </svg>
                        @else
                        <div class="flex">
                            @foreach ($images as $index=>$image)
                            <div>
                                <img class="max-w-24 max-h-24 rounded-full" src="{{ $image->temporaryUrl() }}" alt="immagine utente">
                                <i wire:click='removeImage({{$index}})' class="fa-regular fa-circle-xmark size-4 text-red-500"></i>
                            </div>
                            @endforeach
                        </div>
                    @endif
                    

                    <div id="image-preview" class="hidden mt-4">
                        <img id="preview-image" src="#" alt="Uploaded Image"
                            class="max-h-40 mx-auto rounded-full" />
                    </div>

                    <div class="mt-4 flex text-sm leading-6 text-gray-600 justify-center">
                        <label for="file-upload"
                            class="relative cursor-pointer rounded-md font-semibold text-emerald-600 focus-within:outline-none hover:text-emerald-400">
                            <span>{{ __('ui.caricaFile') }}</span>
                            <input wire:model='temporary_images' id="file-upload" name="images" type="file" multiple
                                class="sr-only" />
                        </label>
                        <p class="pl-1">{{ __('ui.trascinaRilascia') }}</p>
                    </div>

                    <p class="text-xs leading-5 text-gray-600">PNG, JPG, JPEG up to 5MB</p>
                </div>
            </div>
            @error('temporary_images.*')
            <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <!--fine upload file-->

        <!--button publica-->
        <div class="mt-6 flex items-center justify-center gap-x-6">
            <button type="submit" class="bg-emerald-400 py-2 px-14 rounded-full hover:bg-emerald-200 transition-all"
                x-data @click="setTimeout(()=>{window.scrollTo({top: 0, behavior: 'smooth'})},1000)"><i wire:loading
                    class="fa-solid fa-spinner fa-spin me-2"></i>{{ __('ui.buttonForm') }}</button>
        </div>
        <!--fine bottom publica-->

    </form>
</div>
