<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;

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

        Department::create($validateData);

        return redirect()->route('departments.index')
            ->with('message', "Data Department Berhasil Ditambahkan");
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

        Department::where('id', $department->id)->update($validateData);

        return redirect()->route('departments.index')
            ->with('message', "Data Department Berhasil Diubah");
    }

    public function destroy(Department $department)
    {
        $department->delete();
        return redirect()->route('departments.index')
            ->with('message', "Data Department Berhasil Dihapus");
    }
}
