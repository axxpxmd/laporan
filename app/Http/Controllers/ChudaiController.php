<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

use Illuminate\Http\Request;

// Models
use App\Models\Code151;

class ChudaiController extends Controller
{
    public function index(Request $request)
    {
        $date = $request->date ? $request->date : Carbon::now()->format('Y-m-d');
        $status = $request->status;
        $code   = $request->code;
        $round  = $request->round;
        $date_status = $request->date_status ? $request->date_status : 'OFF';
        $hdp    = $request->hpd;
        $type   = $request->type;

        $datas = Code151::select('*')
            ->when($date_status == 'OFF', function ($q) use ($date) {
                return $q->where('date', $date);
            })
            ->when($status && $status != 'null', function ($q) use ($status) {
                return $q->where('status', $status);
            })
            ->when($code && $code != 'null', function ($q) use ($code) {
                return $q->where('result', 'LIKE', '%' . $code . '%');
            })
            ->when($round && $round != 'null', function ($q) use ($round) {
                return $q->where('result', 'LIKE', '%' . $round . '%');
            })
            ->when($hdp && $hdp != 'null', function ($q) use ($hdp) {
                return $q->where('result', 'LIKE', '%' . $hdp . '%');
            })
            ->when($type && $type != 'null', function ($q) use ($type) {
                return $q->where('type', $type);
            })
            ->get();

        return view('chudai.index', compact(
            'datas',
            'date',
            'status',
            'code',
            'date_status',
            'hdp',
            'round',
            'type'
        ));
    }

    public function create()
    {
        return view('chudai.create');
    }

    public function store(Request $request)
    {
        $date = Carbon::now()->format('Y-m-d');

        $file_name  = \rand(0, 9999);
        $image      = $request->document_attachment_doc;
        $match_name = $request->match_name;

        $imageName = $file_name .  ' (' . $date . ')' . '.' . $image->extension();
        $request->document_attachment_doc->move('151', $imageName);

        Code151::create([
            'match_name' => $match_name,
            'image' => $imageName,
            'date' => $date
        ]);

        return redirect()
            ->route('1.51')
            ->withSuccess('Berhasil Disimpan.');
    }

    public function edit($id)
    {
        $data = Code151::find($id);

        return $data;
    }

    public function update(Request $request, $id)
    {
        $data = Code151::find($id);
        $data->update([
            'result' => $request->result,
            'status' => $request->status
        ]);

        return redirect()
            ->route('1.51', ['date' => $data->date])
            ->withSuccess('Berhasil Diperbaharui.');
    }

    public function destroy($id)
    {
        Code151::destroy($id);

        return redirect()
            ->route('1.51')
            ->withSuccess('Berhasil Dihapus.');
    }
}
