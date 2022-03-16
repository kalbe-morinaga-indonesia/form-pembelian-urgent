<?php

namespace App\Http\Controllers\Back;

use App\Models\Uom;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UomRequest;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class UomController extends Controller
{
    public function index()
    {
        $uoms = Uom::get();
        return view('back.uom.index', [
            'title' => 'UOM',
            'uoms' => $uoms
        ]);
    }

    public function create()
    {
        return view('back.uom.create', [
            'title' => 'Uom'
        ]);
    }

    public function store(UomRequest $request)
    {
        Uom::create([
            'txtItemCode' => $request->txtItemCode,
            'dtmTanggalKebutuhan' => $request->dtmTanggalKebutuhan,
            'intJumlahKebutuhan' => $request->intJumlahKebutuhan,
        ]);

        Alert::success("Berhasil", "Data uom berhasil ditambahkan");
    }

    public function edit(Request $request)
    {
        return redirect()->route('uoms.index');
    }
}
