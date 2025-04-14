<!DOCTYPE html>
<html>
<head>
    <title>Hapus Pengguna</title>
</head>
<body>
    <h1>Konfirmasi Hapus</h1>
    <p>Apakah kamu yakin ingin menghapus pengguna <strong>{{ $user->nama }}</strong>?</p>
    <form>
        <button type="submit" disabled>Ya, Hapus (Simulasi)</button>
    </form>
    <a href="/User">Batal</a>
</body>
</html>
