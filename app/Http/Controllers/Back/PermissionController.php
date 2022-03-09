<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::get();
        return view('back.role-and-permissions.permissions.index', [
            'title' => 'Permission',
            'permissions' => $permissions
        ]);
    }

    public function create(Permission $permission)
    {
        return view('back.role-and-permissions.permissions.create', [
            'title' => 'Permission',
            'permission' => $permission
        ]);
    }

    public function store(Request $request, Permission $permission)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'guard_name' => 'required'
        ], [
            'name.required' => 'Kolom nama harus diisi',
            'guard_name.required' => 'Kolom guard harus diisi'
        ]);

        Permission::create($validateData);

        Alert::success("Berhasil", "Permission $request->name berhasil ditambahkan");
        return redirect()->route('permissions.index');
    }

    public function edit(Permission $permission)
    {
        return view('back.role-and-permissions.permissions.edit', [
            'title' => 'Permission',
            'permission' => $permission
        ]);
    }

    public function update(Request $request, Permission $permission)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'guard_name' => 'required'
        ], [
            'name.required' => 'Kolom nama harus diisi',
            'guard_name.required' => 'Kolom guard harus diisi'
        ]);

        Permission::where('id', $permission->id)->update($validateData);

        Alert::success("Berhasil", "Permission $request->name berhasil diubah");
        return redirect()->route('permissions.index');
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();
        Alert::success("Berhasil", "Permission $permission->name berhasil dihapus");
        return redirect()->route('permissions.index');
    }
}
