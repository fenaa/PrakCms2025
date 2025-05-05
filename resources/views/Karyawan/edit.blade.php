@extends('layouts.app')
@section('title', 'Edit Karyawan')
@section('content')
<h2>Edit Karyawan</h2>
<form>
  <div class="mb-3"><label>Nama</label><input type="text" class="form-control" value="{{ $karyawan['nama'] }}"></div>
  <div class="mb-3"><label>Telepon</label><input type="text" class="form-control" value="{{ $karyawan['telepon'] }}"></div>
  <div class="mb-3"><label>Email</label><input type="text" class="form-control" value="{{ $karyawan['email'] }}"></div>
  <button class="btn btn-primary">Simpan</button>
  <a href="/karyawan" class="btn btn-secondary">Batal</a>
</form>
@endsection
