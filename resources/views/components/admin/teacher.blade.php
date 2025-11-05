<x-admin.layout>
    <x-slot:judul>{{ $title }}</x-slot:judul>

    <style>
        h2 {
            color: white;
        }

        form#teacherForm {
            width: 70%;
            margin: 0 auto 30px auto;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        form#teacherForm input,
        form#teacherForm select {
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        form#teacherForm button {
            background: #4caf50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        table {

            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid #444;
        }

        th,
        td {
            padding: 10px;
            text-align: center;
            color: white;
        }

        th {
            background: #6d6d6dff;
        }
    </style>

    <h2 style="text-align:center;">Daftar Guru</h2>

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
            @foreach ($teacher as $index => $user)
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
        <h2 style="text-align:center;">Tambah Guru</h2>

    <form id="teacherForm" action="{{ route('admin.teacher.store') }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Nama Guru" required>
        <input type="email" name="email" placeholder="Email Guru" required>
        <input type="text" name="phone" placeholder="Nomor Telepon" required>
        <input type="text" name="address" placeholder="Alamat" required>
        <input type="text" name="subject_name" placeholder="Mata Pelajaran" required>

        <button type="submit">Tambah Guru</button>
    </form>
</x-admin.layout>
