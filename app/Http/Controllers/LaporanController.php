<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

// Models
use App\Models\Periode;
use App\Models\Deskripsi;
use App\Models\Pelapor;

class LaporanController extends Controller
{
    public function index()
    {
        $pelapor = Pelapor::all();

        return view('laporan.index', compact('pelapor'));
    }

    public function create($bulan, Request $request)
    {
        $pelapor_id = $request->pelapor_id;

        $pelapor = Pelapor::find($pelapor_id);

        if (!$pelapor) {
            return redirect()->back()->withErrors(['Pelapor not found']);
        }

        $nama   = $pelapor->nama;
        $posisi = $pelapor->jabatan;
        $projek = $request->projek;

        $periode = Periode::where('bulan', $bulan)->where('is_libur', 0)->get();
        if ($periode->isEmpty()) {
            return redirect()->back()->withErrors(['No periods found for the given month']);
        }

        $deskripsi = Deskripsi::select('id', 'deskripsi')->inRandomOrder()->limit($periode->count())->get();
        if ($deskripsi->isEmpty()) {
            return redirect()->back()->withErrors(['No descriptions available']);
        }

        $n_bulan = Carbon::create()->month($bulan)->isoFormat('MMMM');

        $num = [];
        while (count($num) < $periode->count()) {
            $randNum = rand(1, 54);
            if (!in_array($randNum, $num)) {
            $num[] = $randNum;
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
            'posisi',
            'pelapor'
        ));

        return $pdf->stream("Laporan " . $n_bulan . ".pdf");
    }
}
