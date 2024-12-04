<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

use Illuminate\Http\Request;

// Models
use App\Models\Code151;

class ChudaiController extends Controller
{
    public function index()
    {
        $datas = Code151::select('*')->get();

        return view('chudai.index', compact(
            'datas'
        ));
    }

    public function create()
    {
        return view('chudai.create');
    }

    public function store(Request $request)
    {
        $date = Carbon::now()->format('Y-m-d');

        $match_name  = $request->match_name;
        $image       = $request->document_attachment_doc;

        $imageName = $match_name .  ' (' . $date . ')' . '.' . $image->extension();
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
            ->route('1.51')
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
