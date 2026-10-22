<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Siswa - SMK INFOKOM Bogor</title>
</head>

<body>

    <h1>Dashboard Siswa</h1>

    <p>Selamat datang, {{ auth()->user()->name }}.</p>

    <p>Anda login sebagai siswa.</p>

    <form method="POST" action="{{ url('/logout') }}">
        @csrf

        <button type="submit">
            Logout
        </button>
    </form>

</body>
</html>