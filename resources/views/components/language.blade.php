<form action="{{route('set-language', $language)}}" method="POST">
    @csrf

    <button type="submit">
        <span class="fi fi-{{$nation}} text-xl mt-4 rounded-full"></span>
    </button>
</form>