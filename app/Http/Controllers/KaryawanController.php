<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;

class KaryawanController extends Controller
{
    public function index()
    {
        return view('karyawan.index', ['karyawans' => Karyawan::all()]);
    }

    public function show($id)
    {
        $data = collect(Karyawan::all())->firstWhere('id', $id);
        return view('karyawan.show', ['karyawan' => $data]);
    }

    public function edit($id)
    {
        $data = collect(Karyawan::all())->firstWhere('id', $id);
        return view('karyawan.edit', ['karyawan' => $data]);
    }

    public function destroy($id)
    {
        $data = collect(Karyawan::all())->firstWhere('id', $id);
        return view('karyawan.delete', ['karyawan' => $data]);
    }
}
