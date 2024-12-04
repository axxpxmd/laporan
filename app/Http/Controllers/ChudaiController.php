<?php

namespace App\Http\Controllers;

use App\Models\Code151;
use Carbon\Carbon;
use Illuminate\Http\Request;

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
        $description = $request->description;

        $imageName = $match_name .  ' (' . $date . ')' . '.' . $image->extension();
        $request->document_attachment_doc->move('151', $imageName);

        Code151::create([
            'match_name' => $match_name,
            'image' => $imageName,
            'description' => $description,
            'date' => $date
        ]);

        return redirect()
            ->route('1.51')
            ->withSuccess('Berhasil Disimpan.');
    }
}
