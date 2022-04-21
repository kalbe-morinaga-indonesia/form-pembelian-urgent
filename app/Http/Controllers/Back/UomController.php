<?php

namespace App\Http\Controllers\Back;

use App\Models\Uom;
use App\Http\Controllers\Controller;
use App\Http\Requests\UomRequest;
use RealRashid\SweetAlert\Facades\Alert;

class UomController extends Controller
{

    public function __construct()
    {
        $this->middleware('role:admin');
    }

    public function index()
    {
        $uoms = Uom::get();
        return view('back.uom.index', [
            'title' => 'UOM',
            'uoms' => $uoms
        ]);
    }

    public function create(Uom $uom)
    {
        return view('back.uom.create', [
            'title' => 'Uom',
            'uom' => $uom
        ]);
    }

    public function store(UomRequest $request)
    {
        $nama_user = Auth()->user()->txtNama;

        Uom::create([
            'txtUom' => $request->txtUom,
            'txtInsertedBy' => $nama_user,
            'txtUpdatedBy' => $nama_user
        ]);

        Alert::success("Berhasil", "Data uom $request->txtUom berhasil ditambahkan");
        return redirect()->route('uoms.index');
    }

    public function edit(Uom $uom)
    {
        return view('back.uom.edit', [
            'title' => "Uom",
            'uom' => $uom
        ]);
    }

    public function update(Uom $uom, UomRequest $request)
    {
        $nama_user = Auth()->user()->txtNama;

        Uom::where('id', $uom->id)->update([
            'txtUom' => $request->txtUom,
            'txtUpdatedBy' => $nama_user
        ]);

        Alert::success("Berhasil", "Data uom $request->txtUom berhasil diubah");
        return redirect()->route('uoms.index');
    }

    public function destroy(Uom $uom)
    {
        $uom->delete();
        Alert::success("Berhasil", "Data uom $uom->txtUom berhasil dihapus");
        return redirect()->route('uoms.index');
    }
}
