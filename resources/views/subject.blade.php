<x-layout>
    <x-slot:judul>{{ $title }}</x-slot:judul>
    <style>
        h2 {
            color: white;
        }

        table {
            width: 60%;
            margin: 20px auto;
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
    </head>

    <body>
        <h2 style="text-align:center;">Subject</h2>
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($subject as $index => $user)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $user['name'] }}</td>
                        <td class="px-6 py-4">
                            @if ($user->teacher)
                                {{ $user->teacher->name }}
                            @endif
                        </td>


                    </tr>
                @endforeach

            </tbody>
        </table>
</x-layout>