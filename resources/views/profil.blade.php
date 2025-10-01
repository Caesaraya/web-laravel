<x-layout>
    <link rel="stylesheet" href="{{ asset('css/profil.css') }}">
        <x-slot:judul>{{ $title }}</x-slot:judul>

    <section class="card-profile">
        <img class="avatar" src="{{ asset('images/person.png') }}" alt="Foto Profil">
        <h2 class="name">{{ $nama }}</h2>
        <div class="info">
            <p class="tag">{{ $tanggal }}</p>
            <p class="tag">{{ $kelas }}</p>
        </div>
    </section>
</x-layout>
