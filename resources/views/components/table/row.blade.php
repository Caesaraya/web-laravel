@props([
    'item',
    'columns' => [],
    'index' => null,
    'hasActions' => false
])

<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-600">
    @foreach ($columns as $col)
    <!-- Melakukan perulangan melalui array $columns yang mendefinisikan kolom yang harus ditampilkan. Setiap item $col adalah definisi satu kolom. -->
        <td class="px-6 py-4">
            @if ($col['key'] === 'index')
            <!-- Jika kunci kolom didefinisikan sebagai 'index', sel akan menampilkan nilai dari properti -->
                {{ $index }}
            @elseif (isset($col['relation']))
            <!-- Jika definisi kolom memiliki kunci 'relation', artinya data yang ingin ditampilkan berasal dari relasi Eloquent pada objek $item -->
                {{ $item->{$col['relation']}->{$col['relation_key']} ?? '-' }}
                <!-- Mengambil data melalui relasi. Operator ?? '-' adalah null coalescing, yang akan menampilkan tanda hubung (-) jika relasi atau datanya tidak ada -->
            @else
                {{ $item->{$col['key']} }}
                <!-- Menampilkan nilai properti $item berdasarkan kunci kolom yang didefinisikan -->
            @endif
        </td>
    @endforeach

    @if ($hasActions)
    <!-- Seluruh blok ini hanya akan dirender jika properti $hasActions bernilai true. -->
        <td class="px-6 py-4 text-right flex gap-3">

            {{-- Edit Button --}}
            <button 
                data-modal-target="editModal{{ $item->id }}"
                data-modal-toggle="editModal{{ $item->id }}"
                class="text-blue-600 hover:text-blue-800 font-medium">
                Edit
            </button>

            {{-- Delete Button --}}
            <button 
                data-modal-target="deleteModal{{ $item->id }}"
                data-modal-toggle="deleteModal{{ $item->id }}"
                class="text-red-600 hover:text-red-800 font-medium">
                Delete
            </button>
        </td>
    @endif
</tr>
