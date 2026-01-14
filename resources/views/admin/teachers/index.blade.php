<x-admin.layout>
    <div class="mb-6 flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-semibold text-gray-900 dark:text-white">Data Guru</h1>
            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Daftar seluruh guru yang terdaftar</p>
        </div>

        <x-add-button title="Tambah Guru" modalId="addTeacherModal" />
    </div>

    @if (session('success'))
        <div class="mb-4 p-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="mb-4 p-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

<!-- Search Bar -->
<form method="GET" class="mb-4">
    <div class="flex gap-2 max-w-md">
        <input
            type="text"
            name="search"
            value="{{ request('search') }}"
            placeholder="Cari nama, email, atau telepon..."
            class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm
                   focus:border-blue-500 focus:ring-blue-500
                   dark:border-gray-600 dark:bg-gray-700 dark:text-white"
        />

        <button
            type="submit"
            class="rounded-lg bg-blue-600 px-4 py-2 text-sm font-medium text-white
                   hover:bg-blue-700">
            Cari
        </button>
    </div>
</form>
    <x-table :columns="$columns" :data="$teachers" has-actions>
        @forelse ($teachers as $teacher)
            <x-table.row :item="$teacher" :columns="$columns" :index="$loop->iteration"
                has-actions
                edit-route="admin.teachers.update"
                delete-route="admin.teachers.destroy" />
        @empty
            <tr>
                <td colspan="{{ count($columns) + 1 }}" class="px-6 py-4 text-center text-sm text-gray-500 dark:text-gray-400">
                    Tidak ada data guru
                </td>
            </tr>
        @endforelse
    </x-table>
<!-- Pagination -->
@if ($teachers instanceof \Illuminate\Pagination\LengthAwarePaginator)
    <div class="mt-4">
        {{ $teachers->links() }}
    </div>
@endif
    <x-form-modal id="addTeacherModal" title="Tambah Data Guru" action="{{ route('admin.teachers.store') }}"
        method="POST">
        <x-form-fields :fields="$formFields" />
    </x-form-modal>

    @foreach ($teachers as $teacher)
        <x-form-modal id="editModal{{ $teacher->id }}" title="Edit Data Guru"
            action="{{ route('admin.teachers.update', $teacher) }}" method="PUT">
            <x-form-fields :fields="$formFields" :data="$teacher" />
        </x-form-modal>

<x-form-modal id="deleteModal{{ $teacher->id }}" title="Konfirmasi Penghapusan"
            action="{{ route('admin.teachers.destroy', $teacher) }}" method="DELETE">

            <p class="text-gray-700 dark:text-gray-300">
                Apakah Anda yakin ingin menghapus data {{ $teacher->name }}?
            </p>

        </x-form-modal>    @endforeach
</x-admin.layout>
