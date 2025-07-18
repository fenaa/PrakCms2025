<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;
use App\Models\Produk;
use App\Models\Transaksi;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahPelanggan = Pelanggan::count();
        $jumlahProduk = Produk::count();

        $hariIni = Carbon::today();
        $jumlahTransaksiHariIni = Transaksi::whereDate('tanggal_transaksi', $hariIni)->count();
        $totalPendapatanHariIni = Transaksi::whereDate('tanggal_transaksi', $hariIni)->sum('harga');

        return view('Dashboard.index', compact(
            'jumlahPelanggan',
            'jumlahProduk',
            'jumlahTransaksiHariIni',
            'totalPendapatanHariIni'
        ));
    }
}
