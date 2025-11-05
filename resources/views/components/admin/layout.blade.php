<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 dark:bg-gray-900">

    <x-admin.navbar></x-admin.navbar>

    <x-admin.sidebar></x-admin.sidebar>

    <!-- Main Content Area -->
    <main class="p-4 md:ml-64 min-h-screen pt-20">
        <div class="mx-auto max-w-full">
            {{ $slot }}
        </div>
    </main>

</body>

</html>