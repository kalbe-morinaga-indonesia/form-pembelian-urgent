<?php

namespace App\Http\Controllers\Back;

use App\Models\Lokasi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LokasiRequest;
use RealRashid\SweetAlert\Facades\Alert;

class LokasiController extends Controller
{
    public function index()
    {
        $lokasis = Lokasi::get();
        return view('back.lokasi.index',[
            'title' => 'Lokasi',
            'lokasis' => $lokasis
        ]);
    }

    public function create(Lokasi $lokasi)
    {
        return view('back.lokasi.create', [
            'title' => 'Lokasi',
            'lokasi' => $lokasi,
        ]);
    }

    public function store(LokasiRequest $request)
    {

        $namaUser = Auth()->user()->txtNama;

        Lokasi::create([
            'txtIdLokasi' => $request['txtIdLokasi'],
            'txtNamaLokasi' => $request['txtNamaLokasi'],
            'txtInsertedBy' => $namaUser,
            'txtUpdatedBy' => $namaUser
        ]);

        Alert::success('Berhasil', "Lokasi $request->txtNamaLokasi telah di tambah");
        return redirect()->route('lokasi.index');
    }

    public function edit(Lokasi $lokasi)
    {
        return view('back.lokasi.edit', [
            'title' => 'Lokasi',
            'lokasi' => $lokasi,
        ]);
    }

    public function update(Lokasi $lokasi, Request $request)
    {

        $namaUser = Auth()->user()->txtNama;

        Lokasi::where('id', $lokasi->id)->update([
            'txtIdLokasi' => $request['txtIdLokasi'],
            'txtNamaLokasi' => $request['txtNamaLokasi'],
            'txtUpdatedBy' => $namaUser
        ]);

        Alert::success('Berhasil', "Lokasi $lokasi->txtNamaLokasi telah di ubah");
        return redirect()->route('lokasi.index');
    }


    public function destroy(Lokasi $lokasi)
    {
        $lokasi->delete();
        Alert::success('Berhasil', "Lokasi $lokasi->txtNamaLokasi telah di hapus");
        return redirect()->route('lokasi.index');
    }
}
