<?php

namespace App\Http\Controllers\Back;

use App\Models\Divisi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'txtIdDivisi' => 'required',
            'txtNamaDivisi' => 'required',
        ], [
            'txtIdDivisi.required' => 'Id Divisi wajib diisi',
            'txtNamaDivisi.required' => 'Nama Divisi wajib diisi'
        ]);

        $namaUser = Auth()->user()->txtNama;

        Divisi::create([
            'txtIdDivisi' => $validateData['txtIdDivisi'],
            'txtNamaDivisi' => $validateData['txtNamaDivisi'],
            'txtInsertedBy' => $namaUser,
            'txtUpdatedBy' => $namaUser
        ]);

        Alert::success('Berhasil', "Divisi $request->txtNamaDivisi telah di tambah");
        return redirect()->route('divisions.index');
    }

    public function destroy(Divisi $divisi)
    {
        $divisi->delete();
        Alert::success('Berhasil', "Divisi $divisi->txtNamaDivisi telah di hapus");
        return redirect()->route('divisions.index');
    }
}
