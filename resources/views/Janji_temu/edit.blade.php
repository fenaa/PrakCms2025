@extends('layouts.app')
@section('title', 'Edit Janji Temu')
@section('content')
<h2>Edit Janji Temu</h2>
<form>
  <div class="mb-3"><label>ID Pelanggan</label><input type="text" class="form-control" value="{{ $janjiTemu['id_pelanggan'] }}"></div>
  <div class="mb-3"><label>ID Karyawan</label><input type="text" class="form-control" value="{{ $janjiTemu['id_karyawan'] }}"></div>
  <div class="mb-3"><label>Tanggal</label><input type="text" class="form-control" value="{{ $janjiTemu['tanggal'] }}"></div>
  <div class="mb-3"><label>Waktu</label><input type="text" class="form-control" value="{{ $janjiTemu['waktu'] }}"></div>
  <div class="mb-3"><label>Status</label><input type="text" class="form-control" value="{{ $janjiTemu['status'] }}"></div>
  <button class="btn btn-primary">Simpan</button>
  <a href="/janji-temu" class="btn btn-secondary">Batal</a>
</form>
@endsection
