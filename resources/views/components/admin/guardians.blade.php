<x-admin.layout>
    <x-slot:judul>{{ $title }}</x-slot:judul>
     <style>
        h2 {
            color: white;
        }
        table {
            width: 70%;
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
    </style>
</head>
<body>
    <h2 style="text-align:center;">Guardian List</h2>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Job</th>
                <th>Phone</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
             @foreach ($guardian as $index => $user)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $user['name'] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $user['job'] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $user['phone'] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $user['email'] }}</td>
                    </tr>
                @endforeach

        </tbody>
    </table>
    <h2 style="text-align:center;">Tambah Guardian</h2>

<form id="guardianForm" action="{{ route('admin.guardians.store') }}" method="POST" style="width:70%; margin:0 auto 30px auto;">
    @csrf
    <div style="display: flex; flex-direction: column; gap: 10px;">
        <input type="text" name="name" placeholder="Nama" required>
        <input type="text" name="job" placeholder="Pekerjaan" required>
        <input type="text" name="phone" placeholder="No HP" required>
        <input type="email" name="email" placeholder="Email" required>
        <button type="submit" style="background:#4caf50; color:white; padding:10px; border:none; border-radius:5px; cursor:pointer;">
            Tambah
        </button>
    </div>
</form>
        

</x-admin.layout>