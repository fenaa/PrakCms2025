<h2>Konfirmasi Hapus Pengguna</h2>
<p>Apakah Anda yakin ingin menghapus pengguna berikut?</p>
<p><strong>Nama:</strong> {{ $user->nama }}</p>
<p><strong>Email:</strong> {{ $user->email }}</p>
<p><strong>No Telepon:</strong> {{ $user->nomor_telepon }}</p>

<form action="/pengguna/{{ $user->id }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Hapus</button>
</form>
<a href="/pengguna">Batal</a>
