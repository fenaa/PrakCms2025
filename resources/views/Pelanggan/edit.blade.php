@extends('layouts.app')
@section('title', 'Edit Pelanggan')
@section('content')
<h2>Edit Pelanggan</h2>
<form>
  <div class="mb-3"><label class="form-label">Nama</label><input type="text" class="form-control" value="{{ $pelanggan['nama'] }}"></div>
  <div class="mb-3"><label class="form-label">Alamat</label><input type="text" class="form-control" value="{{ $pelanggan['alamat'] }}"></div>
  <div class="mb-3"><label class="form-label">Jenis Kelamin</label><input type="text" class="form-control" value="{{ $pelanggan['jenis_kelamin'] }}"></div>
  <div class="mb-3"><label class="form-label">Telepon</label><input type="text" class="form-control" value="{{ $pelanggan['telepon'] }}"></div>
  <div class="mb-3"><label class="form-label">Email</label><input type="text" class="form-control" value="{{ $pelanggan['email'] }}"></div>
  <button class="btn btn-primary">Simpan</button>
  <a href="/pelanggan" class="btn btn-secondary">Batal</a>
</form>
@endsection
