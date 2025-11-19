<x-admin.layout>
    <x-slot:judul>{{ $title }}</x-slot:judul>
    <link rel="stylesheet" href="{{ asset('css/teacher.css') }}">

    <h2>Daftar Guru</h2>

    <button class="btn" id="openModal">+ Tambah Guru</button>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Mata Pelajaran</th>
                <th>Telepon</th>
                <th>Email</th>
                <th>Alamat</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($teacher as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->subject->name ?? '-' }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->address }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Modal Form -->
    <div id="teacherModal" class="modal">
        <div class="modal-content">
            <span class="close" id="closeModal">&times;</span>
            <h3 style="color:white; text-align:center;">Tambah Guru</h3>
            <form action="{{ route('admin.teacher.store') }}" method="POST">
                @csrf

                <label for="name">Nama</label>
                <input type="text" id="name" name="name" required>

                <label for="subject_id">Mata Pelajaran</label>
                <select name="subject_id" id="subject_id" required>
                    <option value="">-- Pilih Mata Pelajaran --</option>
                    @foreach ($subjects as $subject)
                        <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                    @endforeach
                </select>

                <label for="phone">Telepon</label>
                <input type="text" id="phone" name="phone" required>

                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>

                <label for="address">Alamat</label>
                <input type="text" id="address" name="address" required>

                <button class="btn" type="submit">Simpan</button>
            </form>
        </div>
    </div>

    <script>
        const modal = document.getElementById("teacherModal");
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
