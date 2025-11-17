<x-admin.layout>
    <x-slot:judul>{{ $title }}</x-slot:judul>

    <style>
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
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
            display: inline-block;
            background: #4caf50;
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
            text-decoration: none;
            margin: 20px auto;
            display: block;
            width: fit-content;
            cursor: pointer;
            border: none;
        }

        /* ===== Modal Style ===== */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0; top: 0;
            width: 100%; height: 100%;
            background-color: rgba(0,0,0,0.6);
        }
        .modal-content {
            background-color: #2d2d2d;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 40%;
            border-radius: 10px;
            color: white;
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }
        .close:hover { color: white; }

        label {
            display: block;
            margin-top: 10px;
        }

        input, select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
            color: black;            /* teks hitam */
            background-color: white; /* latar putih */
        }

        .btn-simpan {
            background: #4caf50;
            color: white;
            border: none;
            padding: 10px 16px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }
    </style>

    <h2 style="text-align:center; color:white;">Daftar Student</h2>

    <!-- Tombol buka modal -->
    <button id="openModalBtn" class="btn">+ Tambah Student</button>

    <!-- Tabel data student -->
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Alamat</th>
                <th>Tanggal Lahir</th>
                <th>Kelas</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($student as $index => $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->address }}</td>
                    <td>{{ $item->birthday }}</td>
                    <td>{{ $item->classroom->name ?? '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- ===== Modal Tambah Student ===== -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h3 style="text-align:center;">Tambah Student Baru</h3>

            <!-- Form tambah student -->
            <form action="{{ route('admin.student.store') }}" method="POST">
                @csrf

                @if ($errors->any())
                    <div style="color: red; text-align:center; margin-bottom:10px;">
                        {{ $errors->first() }}
                    </div>
                @endif

                <label>Nama</label>
                <input type="text" name="name" required>

                <label>Email</label>
                <input type="email" name="email" required>

                <label>Alamat</label>
                <input type="text" name="address" required>

                <label>Tanggal Lahir</label>
                <input type="date" name="birthday" required>

                <label>Kelas</label>
                <select name="classroom_id" required>
                    <option value="">-- Pilih Kelas --</option>
                    @foreach (\App\Models\Classroom::all() as $class)
                        <option value="{{ $class->id }}">{{ $class->name }}</option>
                    @endforeach
                </select>

                <div style="text-align:center;">
                    <button type="submit" class="btn-simpan">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        const modal = document.getElementById("myModal");
        const btn = document.getElementById("openModalBtn");
        const span = document.getElementsByClassName("close")[0];

        btn.onclick = () => { modal.style.display = "block"; }
        span.onclick = () => { modal.style.display = "none"; }
        window.onclick = (event) => {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</x-admin.layout>
