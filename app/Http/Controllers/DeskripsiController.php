<?php

namespace App\Http\Controllers;

use App\Models\Deskripsi;
use Illuminate\Http\Request;

class DeskripsiController extends Controller
{
    public function index()
    {
        $datas = Deskripsi::all();

        $deskripsi = [
            'Membuat function remove untuk menghapus data pengguna',
            'Membuat tampilan tambah data pada menu pengguna',
            'Mendapatkan jenis pendapatan perOPD',
            'Mengatasi Bug',
            'Create function render pada',
            'Membuat function remove untuk menghapus data pengguna',
            'Membuat validasi form pada halaman login',
            'Menambahkan fitur pencarian data',
            'Optimasi query database',
            'Membuat middleware untuk autentikasi',
            'Implementasi API untuk mobile app',
            'Membuat unit test untuk fungsi baru',
            'Refactor kode untuk meningkatkan performa',
            'Menambahkan fitur export data ke Excel',
            'Membuat halaman dashboard admin',
            'Integrasi dengan layanan pembayaran online',
            'Membuat notifikasi email untuk pengguna',
            'Menambahkan fitur upload file',
            'Membuat sistem manajemen pengguna',
            'Membuat laporan bulanan otomatis',
            'Menambahkan fitur filter data',
            'Membuat dokumentasi API',
            'Membuat halaman profil pengguna',
            'Menambahkan fitur reset password',
            'Membuat fitur komentar pada postingan',
            'Menambahkan pagination pada daftar pengguna',
            'Membuat sistem notifikasi push',
            'Integrasi dengan layanan SMS gateway',
            'Membuat fitur multi-bahasa',
            'Menambahkan fitur drag and drop',
            'Membuat sistem backup otomatis',
            'Membuat fitur import data dari CSV',
            'Menambahkan fitur dark mode',
            'Membuat sistem manajemen role dan permission',
            'Membuat fitur live chat',
            'Integrasi dengan layanan peta online',
            'Membuat fitur analitik pengguna',
            'Menambahkan fitur two-factor authentication',
            'Membuat sistem manajemen konten',
            'Membuat fitur rekomendasi produk',
            'Menambahkan fitur wishlist',
            'Membuat sistem manajemen inventaris',
            'Membuat fitur kalender acara',
            'Menambahkan fitur laporan keuangan',
            'Membuat fitur integrasi dengan media sosial',
            'Menambahkan fitur rating dan review',
            'Membuat sistem manajemen proyek',
            'Membuat fitur integrasi dengan CRM',
            'Menambahkan fitur manajemen tugas',
            'Membuat fitur integrasi dengan ERP',
            'Menambahkan fitur manajemen pengiriman',
            'Membuat fitur integrasi dengan layanan email marketing',
            'Menambahkan fitur manajemen pelanggan',
            'Membuat fitur integrasi dengan layanan cloud storage'

        ];

        return view('deskripsi.index', compact(
            'datas'
        ));
    }

    public function edit($id)
    {
        $data = Deskripsi::find($id);

        return $data;
    }

    public function update(Request $request, $id)
    {
        $data = Deskripsi::find($id);
        $data->update($request->all());

        return redirect()
            ->route('deskripsi.index')
            ->withSuccess('Berhasil Diperbaharui');
    }

    public function store(Request $request)
    {
        Deskripsi::create($request->all());

        return redirect()
            ->route('deskripsi.index')
            ->withSuccess('Berhasil Ditambahkan');
    }

    public function destroy($id)
    {
        Deskripsi::destroy($id);

        return redirect()
            ->route('deskripsi.index')
            ->withSuccess('Berhasil Dihapus');
    }
}
