<!DOCTYPE html>
<html>
<head>
    <title>Daftar Pengguna</title>
</head>
<body>
    <h1>Daftar Pengguna</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Jenis Kelamin</th>
                <th>Nomor Telepon</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->nama }}</td>
                <td>{{ $user->alamat }}</td>
                <td>{{ $user->jenis_kelamin }}</td>
                <td>{{ $user->nomor_telepon }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <a href="/User/{{ $user->id }}">Lihat</a> |
                    <a href="/User/{{ $user->id }}/edit">Edit</a> |
                    <a href="/User/{{ $user->id }}/delete">Hapus</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
