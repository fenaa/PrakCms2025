<h2>Daftar Pengguna</h2>
<a href="/pengguna/create">+ Tambah Pengguna</a>
<table border="1" cellpadding="5">
    <tr>
        <th>Nama</th>
        <th>Email</th>
        <th>No Telepon</th>
        <th>Aksi</th>
    </tr>
    @foreach ($users as $user)
    <tr>
        <td>{{ $user->nama }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->nomor_telepon }}</td>
        <td>
            <a href="/pengguna/{{ $user->id }}">Lihat</a> |
            <a href="/pengguna/{{ $user->id }}/edit">Edit</a> |
            <a href="/pengguna/{{ $user->id }}/delete">Hapus</a> 
        </td>
    </tr>
    @endforeach
</table>