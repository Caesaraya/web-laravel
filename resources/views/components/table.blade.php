@props([
    'columns' => [],
    'data' => [],
    'hasActions' => false,
])

<div class="overflow-x-auto rounded-lg shadow">
    <table class="w-full text-sm text-left text-gray-600 dark:text-gray-300">
        <thead class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200">
            <tr>
                @foreach ($columns as $col)
                <!-- Melakukan perulangan untuk membuat kolom header berdasarkan array $columns yang diteruskan. -->
                    <th class="px-6 py-3 font-semibold">
                        {{ $col['label'] }}
                        <!-- Menampilkan label kolom (teks header) yang diambil dari konfigurasi $columns -->
                    </th>
                @endforeach

                @if($hasActions)
                <!-- Jika properti $hasActions bernilai true, maka kolom terakhir akan berlabel teks "aksi" -->
                    <th class="px-6 py-3 text-center">Aksi</th>
                @endif
            </tr>
        </thead>

        <tbody>
            {{ $slot }}
        </tbody>
    </table>
</div>
