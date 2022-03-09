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

    public function create()
    {
        return view('back.department.create', [
            'title' => 'Department'
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

        return redirect()->route('departments.index')->with('message', 'Data Department Berhasil Ditambahkan');
    }
}
