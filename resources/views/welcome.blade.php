<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Pengguna</title>
</head>
<body>
    <h1>CRUD Pengguna</h1>

    <!-- Daftar Pengguna -->
    <h2>Daftar Pengguna</h2>
    <a href="/pengguna/create">+ Tambah Pengguna</a>
    <ul>
        @foreach ($users as $user)
            <li>
                {{ $user['nama'] }} - {{ $user['email'] }}
                | <a href="/pengguna/{{ $user['id'] }}">Lihat</a>
                | <a href="/pengguna/{{ $user['id'] }}/edit">Edit</a>
            </li>
        @endforeach
    </ul>

    <!-- Form Tambah Pengguna -->
    @isset($createForm)
        <h2>Form Tambah Pengguna</h2>
        <form action="/pengguna/store" method="POST">
            @csrf
            Nama: <input type="text" name="nama"><br>
            Email: <input type="text" name="email"><br>
            Nomor Telepon: <input type="text" name="nomor_telepon"><br>
            <button type="submit">Simpan</button>
        </form>
    @endisset

    <!-- Form Edit Pengguna -->
    @isset($editForm)
        <h2>Edit Pengguna</h2>
        <form action="/pengguna/{{ $user['id'] }}/update" method="POST">
            @csrf
            @method('PUT')
            Nama: <input type="text" name="nama" value="{{ $user['nama'] }}"><br>
            Email: <input type="text" name="email" value="{{ $user['email'] }}"><br>
            Nomor Telepon: <input type="text" name="nomor_telepon" value="{{ $user['nomor_telepon'] }}"><br>
            <button type="submit">Update</button>
        </form>
    @endisset

    <!-- Detail Pengguna -->
    @isset($userDetail)
        <h2>Detail Pengguna</h2>
        <p>Nama: {{ $user['nama'] }}</p>
        <p>Email: {{ $user['email'] }}</p>
        <p>No HP: {{ $user['nomor_telepon'] }}</p>
        <a href="/pengguna">Kembali</a>
    @endisset
</body>
</html>
