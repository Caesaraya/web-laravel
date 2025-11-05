<x-admin.layout>
    <x-slot:judul>{{ $title }}</x-slot:judul>

    <style>
        h2 {
            color: white;
        }

        form#studentForm {
            width: 70%;
            margin: 0 auto 30px auto;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        form#studentForm input,
        form#studentForm select {
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        form#studentForm button {
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

    

    <h2 style="text-align:center;">Student List</h2>

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
            @foreach ($student as $index => $student)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->address }}</td>
                    <td>{{ $student->birthday }}</td>
                    <td>{{ $student->classroom->name ?? '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <h2 style="text-align:center;">Tambah Student</h2>

    <form id="studentForm" action="{{ route('admin.student.store') }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Nama" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="text" name="address" placeholder="Alamat" required>
        <input type="date" name="birthday" placeholder="Tanggal Lahir" required>

        <select name="classroom_id" required>
            <option value="">-- Pilih Kelas --</option>
            @foreach ($classrooms as $class)
                <option value="{{ $class->id }}">{{ $class->name }}</option>
            @endforeach
        </select>

        <button type="submit">Tambah</button>
    </form>
</x-admin.layout>
