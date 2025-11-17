<x-admin.layout>
    <x-slot:judul>{{ $title }}</x-slot:judul>

    <style>
        h2 {
            color: white;
            text-align: center;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #444;
        }

        th, td {
            padding: 10px;
            text-align: center;
            color: white;
        }

        th {
            background: #6d6d6dff;
        }

        .btn {
            display: block;
            width: 180px;
            margin: 20px auto;
            background: #4caf50;
            color: white;
            text-align: center;
            padding: 10px;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
        }

        /* === Modal Style === */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            padding-top: 60px;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.7);
        }

        .modal-content {
            background-color: #333;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 400px;
            border-radius: 10px;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 24px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: white;
            text-decoration: none;
            cursor: pointer;
        }

        label {
            color: white;
            display: block;
            margin-bottom: 5px;
        }

        input, select {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #555;
            color: black;
        }

        .btn {
            background: #4caf50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
        }

        .btn:hover {
            background: #45a049;
        }
    </style>

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
