<x-admin.layout>
    <!-- Header dengan Button Add -->
    <div class="mb-6 flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-semibold text-gray-900 dark:text-white">Data Siswa</h1>
            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Daftar seluruh siswa yang terdaftar</p>
        </div>

        <!-- Button Tambah Siswa -->
        <x-add-button title="Tambah Siswa" modalId="addStudentModal" />
    </div>

    <!-- Tampilkan pesan sukses -->
    @if (session('success'))
        <div class="mb-4 p-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tampilkan error validation -->
    @if ($errors->any())
        <!-- Memeriksa apakah ada validation errors -->
        <div class="mb-4 p-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Table -->
    <x-table :columns="$columns" :data="$students" has-actions>
        <!-- memanggil komponen table yang memiliki variabel collumns dan data($students), has action menandakan memiliki kolom aksi delete dan update -->
        @forelse ($students as $student)
            <!-- foreelse jika ada data yang kosong maka akan otomatis diisi pemberitahuan eror -->
            <x-table.row :item="$student" :columns="$columns" :index="$loop->iteration" has-actions
                edit-route="admin.students.edit" delete-route="admin.students.destroy" />
        @empty

            <tr>
                <td colspan="{{ count($columns) + 1 }}"
                    class="px-6 py-4 text-center text-sm text-gray-500 dark:text-gray-400">
                    Tidak ada data siswa
                </td>
            </tr>
        @endforelse
    </x-table>

    <!-- Modal Tambah Siswa -->
    <x-form-modal id="addStudentModal" title="Tambah Data Siswa" action="{{ route('admin.students.store') }}"
        method="POST">
        <x-form-fields :fields="$formFields" />
    </x-form-modal>

    <!-- Modal Edit dan Delete untuk setiap student -->
    @foreach ($students as $student)
        <x-form-modal id="editModal{{ $student->id }}" title="Edit Data Siswa"
            action="{{ route('admin.students.update', $student) }}" method="PUT">
            <x-form-fields :fields="$formFields" :data="$student" />
        </x-form-modal>
        <x-form-modal id="deleteModal{{ $student->id }}" title="Konfirmasi Penghapusan"
            action="{{ route('admin.students.destroy', $student) }}" method="DELETE">

            <p class="text-gray-700 dark:text-gray-300">
                Apakah Anda yakin ingin menghapus data {{ $student->name }}?
            </p>

        </x-form-modal>
    @endforeach
</x-admin.layout>