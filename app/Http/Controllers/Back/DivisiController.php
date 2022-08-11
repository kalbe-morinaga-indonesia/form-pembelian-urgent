<?php

namespace App\Http\Controllers\Back;

use App\Models\Divisi;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Http\Requests\DivisiRequest;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class DivisiController extends Controller
{
    public function index()
    {
        $divisions = Divisi::get();
        return view('back.divisi.index',[
            'title' => "Divisi",
            'divisions' => $divisions
        ]);
    }

    public function create(Divisi $divisi){
        return view('back.divisi.create',[
            'title' => "Tambah Divisi",
            'divisi' => $divisi,
        ]);
    }

    public function store(DivisiRequest $request)
    {

        $namaUser = Auth()->user()->txtNama;

        Divisi::create([
            'txtIdDivisi' => $request['txtIdDivisi'],
            'txtNamaDivisi' => $request['txtNamaDivisi'],
            'txtInsertedBy' => $namaUser,
            'txtUpdatedBy' => $namaUser
        ]);

        Alert::success('Berhasil', "Divisi $request->txtNamaDivisi telah di tambah");
        return redirect()->route('divisis.index');
    }

    public function edit(Divisi $divisi)
    {
        return view('back.divisi.edit', [
            'title' => 'Department',
            'divisi' => $divisi
        ]);
    }

    public function update(Divisi $divisi, Request $request)
    {
        $validateData = $request->validate([
            'txtNamaDivisi' => 'required'
        ], [
            'txtNamaDivisi.required' => 'Nama Divisi wajib diisi'
        ]);

        $namaUser = Auth()->user()->txtNama;

        Divisi::where('id', $divisi->id)->update([
            'txtNamaDivisi' => $validateData['txtNamaDivisi'],
            'txtUpdatedBy' => $namaUser
        ]);

        Alert::success('Berhasil', "Divisi $request->txtNamaDivisi telah di ubah");
        return redirect()->route('divisis.index');
    }

    public function destroy(Divisi $divisi)
    {
        $divisi->delete();
        Alert::success('Berhasil', "Divisi $divisi->txtNamaDivisi telah di hapus");
        return redirect()->route('divisis.index');
    }
}
