<x-layouts.mail-layout>

    <h1>Un utente ha chiesto di lavorare con noi</h1>
    <h2>I suoi dati:</h2>

    <p>Nome: {{$user->name}}</p>
    <p>Email: {{$user->email}}</p>

    <p>se vuoi renderlo supervisore clica qui:</p>
    <a href="{{route('make.revisor', compact('user'))}}" class="text-emerald-500">
        Rendi revisore
    </a>

</x-layouts.mail-layout>