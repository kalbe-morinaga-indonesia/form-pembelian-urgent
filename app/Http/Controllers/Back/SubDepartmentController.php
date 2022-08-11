<?php

namespace App\Http\Controllers\Back;

use App\Models\Department;
use Illuminate\Http\Request;
use App\Models\Subdepartments;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\SubdepartmentRequest;

class SubDepartmentController extends Controller
{
    public function index()
    {
        $subdepartments = Subdepartments::get();
        return view('back.subdepartment.index', [
            'title' => 'Sub Department',
            'subdepartments' => $subdepartments
        ]);
    }

    public function create(Subdepartments $subdepartment)
    {
        $departments = Department::get();
        return view('back.subdepartment.create', [
            'title' => 'Department',
            'subdepartment' => $subdepartment,
            'departments' => $departments
        ]);
    }

    public function store(SubdepartmentRequest $request)
    {

        $namaUser = Auth()->user()->txtNama;

        Subdepartments::create([
            'txtIdSubDept' => $request['txtIdSubDept'],
            'txtIdDept' => $request['txtIdDept'],
            'txtNamaSubDept' => $request['txtNamaSubDept'],
            'txtInsertedBy' => $namaUser,
            'txtUpdatedBy' => $namaUser
        ]);

        Alert::success('Berhasil', "SubDepartment $request->txtNamaSubDept telah di tambah");
        return redirect()->route('subdepartments.index');
    }

    public function edit(Subdepartments $subdepartment)
    {
        $departments = Department::get();
        return view('back.subdepartment.edit', [
            'title' => 'Department',
            'subdepartment' => $subdepartment,
            'departments' => $departments
        ]);
    }

    public function update(Subdepartments $subdepartment, Request $request)
    {

        $namaUser = Auth()->user()->txtNama;

        Subdepartments::where('id', $subdepartment->id)->update([
            'txtIdDept' => $request['txtIdDept'],
            'txtNamaSubDept' => $request['txtNamaSubDept'],
            'txtUpdatedBy' => $namaUser
        ]);

        Alert::success('Berhasil', "Sub-Department $subdepartment->txtNamaSubDept telah di ubah");
        return redirect()->route('subdepartments.index');
    }

    public function destroy(Subdepartments $subdepartment)
    {
        $subdepartment->delete();
        Alert::success('Berhasil', "Sub-Department $subdepartment->txtNamaSubDept telah di hapus");
        return redirect()->route('subdepartments.index');
    }
}
