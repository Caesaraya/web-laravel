<x-admin.layout>
    <!-- Header dengan Button Add -->
    <div class="mb-6 flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-semibold text-gray-900 dark:text-white">Data Kelas</h1>
            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Daftar seluruh kelas yang tersedia</p>
        </div>

        <!-- Button Tambah Kelas -->
        <x-add-button title="Tambah Kelas" modalId="addClassroomModal" />
    </div>

    <!-- Pesan sukses -->
    @if (session('success'))
        <div class="mb-4 p-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400">
            {{ session('success') }}
        </div>
    @endif

    <!-- Pesan error -->
    @if ($errors->any())
        <div class="mb-4 p-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Tabel -->
<x-table :columns="$columns" :data="$classrooms">
    @foreach ($classrooms as $classroom)
<tr class="border-b border-gray-300 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-800 transition">
            <td>{{ $loop->iteration }}</td>
            <td>{{ $classroom->name }}</td>

            <td>
                <ul class="list-disc pl-4">
                    @foreach ($classroom->students as $student)
                        <li>{{ $student->name }}</li>
                    @endforeach
                </ul>
            </td>
        </tr>
    @endforeach
</x-table>


    <!-- Modal Tambah Kelas -->
    <x-form-modal id="addClassroomModal" title="Tambah Kelas" 
        action="{{ route('admin.classrooms.store') }}" method="POST">

        <x-form-fields :fields="$formFields" />
    </x-form-modal>

</x-admin.layout>
