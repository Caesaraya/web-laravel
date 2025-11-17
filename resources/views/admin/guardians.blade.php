<x-admin.layout>
    <x-slot:judul>{{ $title }}</x-slot:judul>

    <style>
        h2 { color: white; text-align: center; }
        table {
            width: 70%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        table, th, td { border: 1px solid #444; }
        th, td { padding: 10px; text-align: center; color: white; }
        th { background: #6d6d6dff; }

        .btn-tambah {
            display: block;
            width: 150px;
            margin: 20px auto;
            background: #4caf50;
            color: white;
            text-align: center;
            padding: 10px;
            border-radius: 5px;
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
            margin: 10% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 35%;
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
        input {
    width: 100%;
    padding: 8px;
    margin-top: 5px;
    margin-bottom: 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
    color: black;           /* 🟢 teks input hitam */
    background-color: white; /* 🟢 latar belakang putih */
}

        .btn-simpan {
            background: #4caf50;
            color: white;
            border: none;
            padding: 10px 16px;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>

    <h2>Guardian List</h2>

    <button id="openModalBtn" class="btn-tambah">Tambah Guardian</button>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Job</th>
                <th>Phone</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($guardian as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->job }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->email }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- ===== Modal Tambah Guardian ===== -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h3 style="text-align:center;">Tambah Guardian Baru</h3>

            <form action="{{ route('admin.guardians.store') }}" method="POST">
                @csrf
                <label>Nama</label>
                <input type="text" name="name" required>

                <label>Pekerjaan</label>
                <input type="text" name="job" required>

                <label>No. HP</label>
                <input type="text" name="phone" required>

                <label>Email</label>
                <input type="email" name="email" required>

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
