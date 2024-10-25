<?php

namespace App\Http\Controllers;

use App\Models\Deskripsi;
use Illuminate\Http\Request;

class DeskripsiController extends Controller
{
    public function index()
    {
        $datas = Deskripsi::all();

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
