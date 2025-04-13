<h2>Tambah Pengguna</h2>
<form action="/pengguna" method="POST">
    @csrf
    Nama: <input type="text" name="nama"><br>
    Alamat: <input type="text" name="alamat"><br>
    Jenis Kelamin:
    <select name="jenis_kelamin">
        <option value="L">Laki-laki</option>
        <option value="P">Perempuan</option>
    </select><br>
    Nomor Telepon: <input type="text" name="nomor_telepon"><br>
    Email: <input type="email" name="email"><br>
    <button type="submit">Simpan</button>
</form>
