<x-layout>
    <link rel="stylesheet" href="{{ asset('css/kontak.css') }}">
        <x-slot:judul>{{ $title }}</x-slot:judul>
        
    <main class="content">
        <div class="contact-list">
            <div class="item">
                <img src="https://upload.wikimedia.org/wikipedia/commons/4/4e/Gmail_Icon.png" alt="Gmail">
                <div class="right">
                    <p class="tag">caesaraya0707@gmail.com</p>
                </div>
            </div>

            <div class="item">
                <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WhatsApp">
                <div class="right">
                    <p class="tag">08972340707</p>
                </div>
            </div>

            <div class="item">
                <img src="https://upload.wikimedia.org/wikipedia/commons/a/a5/Instagram_icon.png" alt="Instagram">
                <div class="right">
                    <p class="tag">yarayaray_</p>
                </div>
            </div>
        </div>
    </main>
</x-layout>
