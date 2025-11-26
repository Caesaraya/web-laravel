@props(['title', 'modalId'])
<!-- mendefinisikan properti (data) yang harus atau dapat diterima oleh komponen Blade ini saat digunakan. -->
 
<button type="button"
    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
    data-modal-target="{{ $modalId }}" data-modal-toggle="{{ $modalId }}">
    <!-- Memberi tahu skrip JavaScript modal mana yang menjadi target aksi tombol ini. Nilai $modalId diambil dari properti yang telah didefinisikan. -->
    <!-- Memberi tahu skrip JavaScript bahwa mengklik tombol ini akan mengubah status -->
    {{ $title }}
</button>