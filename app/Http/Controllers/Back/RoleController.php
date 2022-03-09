<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::get();
        return view('back.role-and-permissions.roles.index', [
            'title' => 'Role',
            'roles' => $roles
        ]);
    }

    public function create(Role $role)
    {
        return view('back.role-and-permissions.roles.create', [
            'title' => 'Role',
            'role' => $role
        ]);
    }

    public function store(Request $request, Role $role)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'guard_name' => 'required'
        ], [
            'name.required' => 'Kolom nama harus diisi',
            'guard_name.required' => 'Kolom guard harus diisi'
        ]);

        Role::create($validateData);

        Alert::success("Berhasil", "Role $request->name berhasil ditambahkan");
        return redirect()->route('roles.index');
    }

    public function edit(Role $role)
    {
        return view('back.role-and-permissions.roles.edit', [
            'title' => 'Role',
            'role' => $role
        ]);
    }

    public function update(Request $request, Role $role)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'guard_name' => 'required'
        ], [
            'name.required' => 'Kolom nama harus diisi',
            'guard_name.required' => 'Kolom guard harus diisi'
        ]);

        Role::where('id', $role->id)->update($validateData);

        Alert::success("Berhasil", "Role $request->name berhasil diubah");
        return redirect()->route('roles.index');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        Alert::success("Berhasil", "Role $role->name berhasil dihapus");
        return redirect()->route('roles.index');
    }
}
