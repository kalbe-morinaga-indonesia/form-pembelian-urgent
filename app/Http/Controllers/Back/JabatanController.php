<?php

namespace App\Http\Controllers\Back;

use App\Models\Jabatan;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\JabatanRequest;
use RealRashid\SweetAlert\Facades\Alert;

class JabatanController extends Controller
{
    public function index()
    {
        $jabatans = Jabatan::get();
        return view('back.jabatan.index',[
            'title' => 'Jabatan',
            'jabatans' => $jabatans
        ]);
    }

    public function create(Jabatan $jabatan)
    {
        $departments = Department::get();
        return view('back.jabatan.create', [
            'title' => 'Jabatan',
            'jabatan' => $jabatan,
            'departments' => $departments
        ]);
    }

    public function store(JabatanRequest $request)
    {

        $namaUser = Auth()->user()->txtNama;

        Jabatan::create([
            'txtIdJabatan' => $request['txtIdJabatan'],
            'txtIdDept' => $request['txtIdDept'],
            'txtNamaJabatan' => $request['txtNamaJabatan'],
            'txtInsertedBy' => $namaUser,
            'txtUpdatedBy' => $namaUser
        ]);

        Alert::success('Berhasil', "Jabatan $request->txtNamaJabatan telah di tambah");
        return redirect()->route('jabatan.index');
    }

    public function edit(Jabatan $jabatan)
    {
        $departments = Department::get();
        return view('back.jabatan.edit', [
            'title' => 'Department',
            'jabatan' => $jabatan,
            'departments' => $departments
        ]);
    }

    public function update(Jabatan $jabatan, Request $request)
    {

        $namaUser = Auth()->user()->txtNama;

        Jabatan::where('id', $jabatan->id)->update([
            'txtIdDept' => $request['txtIdDept'],
            'txtNamaJabatan' => $request['txtNamaJabatan'],
            'txtUpdatedBy' => $namaUser
        ]);

        Alert::success('Berhasil', "Jabatan $jabatan->txtNamaJabatan telah di ubah");
        return redirect()->route('jabatan.index');
    }

    public function destroy(Jabatan $jabatan)
    {
        $jabatan->delete();
        Alert::success('Berhasil', "Jabatan $jabatan->txtNamaJabatan telah di hapus");
        return redirect()->route('jabatan.index');
    }
}
