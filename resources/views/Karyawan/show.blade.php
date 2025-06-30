@extends('layouts.app')

@section('content')
<h1>Detail Karyawan</h1>

<ul>
    <li><strong>ID:</strong> {{ $karyawan->id_karyawan }}</li>
    <li><strong>Nama:</strong> {{ $karyawan->nama_karyawan }}</li>
    <li><strong>Jenis Kelamin:</strong> {{ $karyawan->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</li>
    <li><strong>Gaji:</strong> {{ number_format($karyawan->gaji_karyawan, 0, ',', '.') }}</li>
    <li><strong>Tanggal Bergabung:</strong> {{ \Carbon\Carbon::parse($karyawan->tanggal_bergabung)->format('Y-m-d') }}</li>
    <li><strong>Nomor Telepon:</strong> {{ $karyawan->nomor_telpon }}</li>
    <li><strong>Email:</strong> {{ $karyawan->email }}</li>
</ul>

<a href="{{ route('karyawan.index') }}" class="btn btn-secondary mt-2">⬅️ Kembali</a>
@endsection
