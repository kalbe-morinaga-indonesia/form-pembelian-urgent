<?php

namespace App\Http\Controllers\Back;

use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::get();
        return view('back.department.index', [
            'title' => 'Department',
            'departments' => $departments
        ]);
    }

    public function create(Department $department)
    {
        return view('back.department.create', [
            'title' => 'Department',
            'department' => $department
        ]);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'txtNamaDept' => 'required'
        ], [
            'txtNamaDept.required' => 'Nama Department wajib diisi'
        ]);

        $namaUser = Auth()->user()->txtNama;

        Department::create([
            'txtNamaDept' => $validateData['txtNamaDept'],
            'txtInsertedBy' => $namaUser,
            'txtUpdatedBy' => $namaUser
        ]);

        Alert::success('Berhasil', "Department $request->txtNamaDept telah di tambah");
        return redirect()->route('departments.index');
    }

    public function edit(Department $department)
    {
        return view('back.department.edit', [
            'title' => 'Department',
            'department' => $department
        ]);
    }

    public function update(Department $department, Request $request)
    {
        $validateData = $request->validate([
            'txtNamaDept' => 'required'
        ], [
            'txtNamaDept.required' => 'Nama Department wajib diisi'
        ]);

        $namaUser = Auth()->user()->txtNama;

        Department::where('id', $department->id)->update([
            'txtNamaDept' => $validateData['txtNamaDept'],
            'txtUpdatedBy' => $namaUser
        ]);

        Alert::success('Berhasil', "Department $department->txtNamaDept telah di ubah");
        return redirect()->route('departments.index');
    }

    public function destroy(Department $department)
    {
        $department->delete();
        Alert::success('Berhasil', "Department $department->txtNamaDept telah di hapus");
        return redirect()->route('departments.index');
    }
}
