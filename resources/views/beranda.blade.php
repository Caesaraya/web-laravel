<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda</title>
    <link rel="stylesheet" href="{{ asset('css/beranda.css') }}">
</head>

<body>
    <nav>
        <div class="navbar">
            <a href="{{ route('beranda') }}" class="nav-link">Beranda</a>
            <a href="{{ route('profil') }}" class="nav-link">profil</a>
            <a href="{{ route('kontak') }}" class="nav-link">kontak</a>
        </div>
    </nav>

    <h1>Selamat Datang di Home Page</h1>
</body>

</html>