<h2>Edit Data Pengguna</h2>
<form action="/pengguna/{{ $user->id }}" method="POST">
    @csrf
    @method('PUT')
    Nama: <input type="text" name="nama" value="{{ $user->nama }}"><br>
    Alamat: <input type="text" name="alamat" value="{{ $user->alamat }}"><br>
    Jenis Kelamin:
    <select name="jenis_kelamin">
        <option value="L" {{ $user->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki</option>
        <option value="P" {{ $user->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
    </select><br>
    Nomor Telepon: <input type="text" name="nomor_telepon" value="{{ $user->nomor_telepon }}"><br>
    Email: <input type="email" name="email" value="{{ $user->email }}"><br>
    <button type="submit">Update</button>
</form>
