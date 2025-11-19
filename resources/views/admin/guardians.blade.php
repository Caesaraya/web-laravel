<x-admin.layout>
    <x-slot:judul>{{ $title }}</x-slot:judul>
    <link rel="stylesheet" href="{{ asset('css/guardian.css') }}">
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
