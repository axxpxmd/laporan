<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

use Illuminate\Http\Request;

// Models
use App\Models\Periode;

class PeriodeController extends Controller
{
    public function index(Request $request)
    {
        $bulan = $request->bulan ? $request->bulan : 1;

        $periode = Periode::when($bulan, function ($q) use ($bulan) {
            return $q->where('bulan', $bulan);
        })->get();

        return view('periode.index', compact(
            'periode',
            'bulan'
        ));
    }

    public function generateTanggal($bulan)
    {
        $total_hari = Carbon::now()->month($bulan)->daysInMonth;

        for ($i = 1; $i <= $total_hari; $i++) {
            $hari = Carbon::now()->month($bulan)->day($i)->isoFormat('dddd');
            if ($hari == 'Minggu' || $hari == 'Sabtu') {
                $is_libur = 1;
            } else {
                $is_libur = 0;
            }

            Periode::UpdateOrCreate([
                'tanggal' => $i,
                'bulan' => $bulan,
                'tahun' => date('Y'),
                'hari' => Carbon::now()->month($bulan)->day($i)->isoFormat('dddd'),
                'is_libur' => $is_libur
            ]);
        }

        return redirect()
            ->route('periode', 'bulan=' . $bulan)
            ->withSuccess('Berhasil Generate');
    }

    public function libur($id)
    {
        $periode = Periode::find($id);
        $periode->update([
            'is_libur' => 1
        ]);

        return redirect()
            ->route('periode', 'bulan=' . $periode->bulan)
            ->withSuccess('Berhasil Meliburkan');
    }

    public function batalkanLibur($id)
    {
        $periode = Periode::find($id);
        $periode->update([
            'is_libur' => 0
        ]);

        return redirect()
            ->route('periode', 'bulan=' . $periode->bulan)
            ->withSuccess('Berhasil Batalkan Libur');
    }
}
