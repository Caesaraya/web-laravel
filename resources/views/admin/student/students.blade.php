<x-admin.layout>
    <x-slot:judul>{{ $title }}</x-slot:judul>
    <link rel="stylesheet" href="{{ asset('css/student.css') }}">

    <h2 style="text-align:center; color:white;">Daftar Student</h2>

    <!-- Tombol buka modal tambah -->
    <button id="openModalBtn" class="btn">+ Tambah Student</button>

    <!-- ===================== TABEL STUDENT ===================== -->
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Alamat</th>
                <th>Tanggal Lahir</th>
                <th>Kelas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($student as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->address }}</td>
                    <td>{{ $item->birthday }}</td>
                    <td>{{ $item->classroom->name ?? '-' }}</td>

                    <td>
                        <!-- Tombol Update -->
                        <button class="btn" style="background:orange; color:white;"
                                onclick="openUpdateModal({{ $item->id }}, '{{ $item->name }}', '{{ $item->email }}', '{{ $item->address }}', '{{ $item->birthday }}', '{{ $item->classroom_id }}')">
                            Edit
                        </button>

                        <!-- Tombol Delete -->
                        <button class="btn" style="background:red; color:white;" onclick="openDeleteModal({{ $item->id }})">
                            Delete
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


    <!-- ===================== MODAL TAMBAH ===================== -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h3 style="text-align:center;">Tambah Student Baru</h3>

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


    <!-- ===================== MODAL UPDATE (TERPISAH FILE) ===================== -->
    @include('admin.student.update')

    <!-- ===================== MODAL DELETE (TERPISAH FILE) ===================== -->
    @include('admin.student.delete')


    <!-- ===================== SCRIPT MODAL TAMBAH ===================== -->
    <script>
        const modal = document.getElementById("myModal");
        const btn = document.getElementById("openModalBtn");
        const span = document.getElementsByClassName("close")[0];

        btn.onclick = () => modal.style.display = "block";
        span.onclick = () => modal.style.display = "none";
        window.onclick = (event) => {
            if (event.target == modal) modal.style.display = "none";
        }
    </script>

    <!-- ===================== SCRIPT MODAL UPDATE ===================== -->
   <script>
function openUpdateModal(id, name, email, address, birthday, classroom_id) {
    const modal = document.getElementById('updateModal');
    const form = document.getElementById('updateForm');

    // Set action URL → wajib cocok dengan routing
    form.action = '/admin/student/update/' + id;

    // Isi form
    document.getElementById('update_name').value = name;
    document.getElementById('update_email').value = email;
    document.getElementById('update_address').value = address;
    document.getElementById('update_birthday').value = birthday;
    document.getElementById('update_classroom_id').value = classroom_id;

    modal.style.display = 'block';
}

function closeUpdateModal() {
    document.getElementById('updateModal').style.display = 'none';
}
</script>


</x-admin.layout>
