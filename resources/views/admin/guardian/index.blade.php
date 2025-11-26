<x-admin.layout>
    <!-- Header -->
    <div class="mb-6 flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-semibold text-gray-900 dark:text-white">Data Orang Tua</h1>
            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Daftar seluruh wali murid</p>
        </div>

        <!-- Button Tambah Guardian -->
        <x-add-button title="Tambah Guardian" modalId="addGuardianModal" />
    </div>

    <!-- Pesan sukses -->
    @if (session('success'))
        <div class="mb-4 p-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-900 dark:text-green-400">
            {{ session('success') }}
        </div>
    @endif

    <!-- Pesan error -->
    @if ($errors->any())
        <div class="mb-4 p-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-900 dark:text-red-400">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Table -->
    <x-table :columns="$columns" :data="$guardians" has-actions>
        @forelse ($guardians as $guardian)
            <x-table.row 
                :item="$guardian" 
                :columns="$columns" 
                :index="$loop->iteration"
                has-actions
                edit-modal="editModal{{ $guardian->id }}"
                delete-modal="deleteModal{{ $guardian->id }}"
            />
        @empty
            <tr>
                <td colspan="{{ count($columns) + 1 }}"
                    class="px-6 py-4 text-center text-sm text-gray-500 dark:text-gray-400">
                    Tidak ada data guardian
                </td>
            </tr>
        @endforelse
    </x-table>

    <!-- Modal Tambah -->
    <x-form-modal 
        id="addGuardianModal" 
        title="Tambah Guardian"
        action="{{ route('admin.guardians.store') }}"
        method="POST"
    >
        <x-form-fields :fields="$formFields" />
    </x-form-modal>

    <!-- Modal Edit & Delete -->
    @foreach ($guardians as $guardian)
        <x-form-modal 
            id="editModal{{ $guardian->id }}" 
            title="Edit Guardian"
            action="{{ route('admin.guardians.update', $guardian) }}" 
            method="PUT"
        >
            <x-form-fields :fields="$formFields" :data="$guardian" />
        </x-form-modal>

        <x-delete-modal 
            id="deleteModal{{ $guardian->id }}" 
            action="{{ route('admin.guardians.destroy', $guardian) }}" 
        />
    @endforeach
</x-admin.layout>
