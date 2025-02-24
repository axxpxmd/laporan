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
            'Mengimplementasikan fitur pengenalan suara untuk navigasi aplikasi',
            'Menghapus data pengguna dengan function remove',
            'Mengimplementasikan fitur pengenalan suara untuk navigasi aplikasi',
            'Mengoptimalkan query database untuk meningkatkan performa aplikasi',
            'Mendesain dan mengimplementasikan antarmuka pengguna yang responsif',
            'Menulis unit test dan integrasi test untuk memastikan kualitas kode',
            'Melakukan code review dan memberikan masukan untuk perbaikan',
            'Mengimplementasikan autentikasi dan otorisasi pengguna',
            'Menerapkan praktik keamanan terbaik dalam pengembangan aplikasi',
            'Menggunakan alat CI/CD untuk otomatisasi proses deployment',
            'Memonitor dan memelihara aplikasi yang sudah berjalan di produksi',
            'Mengelola versi dan dependensi proyek menggunakan alat seperti Git dan Composer',
            'Berkoordinasi dengan tim desain dan produk untuk memahami kebutuhan pengguna',
            'Menyediakan dokumentasi teknis untuk fitur dan API yang dikembangkan',
            'Melakukan debugging dan troubleshooting untuk menyelesaikan masalah aplikasi',
            'Mengoptimalkan performa front-end dan back-end aplikasi',
            'Mengimplementasikan fitur real-time menggunakan WebSocket atau teknologi serupa',
            'Mengelola dan mengkonfigurasi server untuk mendukung aplikasi',
            'Menerapkan teknik caching untuk meningkatkan kecepatan aplikasi',
            'Mengimplementasikan GraphQL untuk query data yang lebih fleksibel',
            'Menggunakan Redis untuk caching dan message brokering',
            'Mengoptimalkan penggunaan memori dan CPU pada aplikasi',
            'Menggunakan Elasticsearch untuk meningkatkan kemampuan pencarian aplikasi',
            'Menggunakan teknik lazy loading untuk meningkatkan performa front-end',
            'Mengembangkan dan mengintegrasikan API pihak ketiga',
            'Menggunakan Docker untuk containerization aplikasi',
            'Mengoptimalkan SEO untuk aplikasi web',
            'Menggunakan GraphQL untuk query data yang lebih fleksibel',
            'Menggunakan Jenkins untuk continuous integration dan continuous delivery',
            'Mengelola database dengan menggunakan alat seperti MySQL dan PostgreSQL',


        ];

        foreach ($deskripsi as $desc) {
            Deskripsi::updateOrCreate(['deskripsi' => $desc], ['deskripsi' => $desc]);
        }

        Deskripsi::where('deskripsi', 'like', '%cryptocurrency%')->delete();

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
