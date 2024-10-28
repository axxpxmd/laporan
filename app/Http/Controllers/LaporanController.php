<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

// Models
use App\Models\Periode;
use App\Models\Deskripsi;

class LaporanController extends Controller
{
    public function index()
    {
        return view('laporan.index');
    }

    public function create($bulan, Request $request)
    {
        $projek = $request->projek;
        $nama = $request->nama;
        $posisi = $request->posisi;
        $periode = Periode::where('bulan', $bulan)->where('is_libur', 0)->get();
        $deskripsi = Deskripsi::select('id', 'deskripsi')->inRandomOrder()->limit(count($periode))->get();

        $n_bulan = Carbon::now()->month($bulan)->isoFormat('MMMM');

        for ($i = 0; $i <= count($periode); $i++) {
            $num[$i] = rand(1, 54);
            for ($j = 0; $j < $i; $j++) {
                while ($num[$j] == $num[$i]) {
                    $num[$i] = rand(1, 54);
                    $j = 0;
                }
            }
        }
        sort($num);

        $pdf = app('dompdf.wrapper');
        $pdf->getDomPDF()->set_option("enable_php", true);
        $pdf->setPaper('A4', 'landscape');
        $pdf->loadView('laporan.laporan-pdf', compact(
            'periode',
            'deskripsi',
            'num',
            'projek',
            'bulan',
            'nama',
            'posisi'
        ));

        return $pdf->stream("Laporan " . $n_bulan . ".pdf");
    }
}
