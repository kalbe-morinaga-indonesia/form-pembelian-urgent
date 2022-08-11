<?php

namespace App\Http\Controllers\Back;

use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\DepartmentRequest;
use App\Models\Divisi;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class DepartmentController extends Controller
{

    public function __construct()
    {
        $this->middleware('role:admin');
    }

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
        $divisis = Divisi::get();
        return view('back.department.create', [
            'title' => 'Department',
            'department' => $department,
            'divisis' => $divisis
        ]);
    }

    public function store(DepartmentRequest $request)
    {

        $namaUser = Auth()->user()->txtNama;

        Department::create([
            'txtIdDept' => $request['txtIdDept'],
            'txtIdDivisi' => $request['txtIdDivisi'],
            'txtNamaDept' => $request['txtNamaDept'],
            'txtInsertedBy' => $namaUser,
            'txtUpdatedBy' => $namaUser
        ]);

        Alert::success('Berhasil', "Department $request->txtNamaDept telah di tambah");
        return redirect()->route('departments.index');
    }

    public function edit(Department $department)
    {
        $divisis = Divisi::get();
        return view('back.department.edit', [
            'title' => 'Department',
            'department' => $department,
            'divisis' => $divisis
        ]);
    }

    public function update(Department $department, Request $request)
    {

        $namaUser = Auth()->user()->txtNama;

        Department::where('id', $department->id)->update([
            'txtIdDivisi' => $request['txtIdDivisi'],
            'txtNamaDept' => $request['txtNamaDept'],
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
