<!DOCTYPE html>
<html>
<head>
    <title>Edit Pengguna</title>
</head>
<body>
    <h1>Edit Data</h1>
    <form>
        <p>Nama: <input type="text" value="{{ $user->nama }}"></p>
        <p>Alamat: <input type="text" value="{{ $user->alamat }}"></p>
        <p>Jenis Kelamin: <input type="text" value="{{ $user->jenis_kelamin }}"></p>
        <p>Nomor Telepon: <input type="text" value="{{ $user->nomor_telepon }}"></p>
        <p>Email: <input type="text" value="{{ $user->email }}"></p>
        <button type="submit" disabled>Simpan (Nonaktif)</button>
    </form>
    <a href="/User">Kembali</a>
</body>
</html>
