<x-admin.layout>
    <x-slot:judul>{{ $title }}</x-slot:judul>
    <link rel="stylesheet" href="{{ asset('css/subject.css') }}">

    <h2>Daftar Mata Pelajaran</h2>

    <button class="btn" id="openModal">+ Tambah Subject</button>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Mata Pelajaran</th>
                <th>Guru Pengampu</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($subject as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->teacher->name ?? '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Modal Form -->
    <div id="subjectModal" class="modal">
        <div class="modal-content">
            <span class="close" id="closeModal">&times;</span>
            <h3 style="color:white; text-align:center;">Tambah Mata Pelajaran</h3>
            <form action="{{ route('admin.subject.store') }}" method="POST">
                @csrf

                <label for="name">Nama Mata Pelajaran</label>
                <input type="text" id="name" name="name" required>

                <button class= "btn" type="submit">Simpan</button>
            </form>
        </div>
    </div>

    <script>
        const modal = document.getElementById("subjectModal");
        const openModalBtn = document.getElementById("openModal");
        const closeModalBtn = document.getElementById("closeModal");

        openModalBtn.onclick = function() {
            modal.style.display = "block";
        }

        closeModalBtn.onclick = function() {
            modal.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</x-admin.layout>
