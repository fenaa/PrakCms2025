<!DOCTYPE html>
<html>
<head>
    <title>Detail Pengguna</title>
</head>
<body>
    <h1>Detail Pengguna</h1>
    <p><strong>Nama:</strong> {{ $user->nama }}</p>
    <p><strong>Alamat:</strong> {{ $user->alamat }}</p>
    <p><strong>Jenis Kelamin:</strong> {{ $user->jenis_kelamin }}</p>
    <p><strong>Nomor Telepon:</strong> {{ $user->nomor_telepon }}</p>
    <p><strong>Email:</strong> {{ $user->email }}</p>

    <a href="/User">Kembali</a>
</body>
</html>
