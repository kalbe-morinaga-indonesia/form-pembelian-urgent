<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Permission;

class AssignPermissionController extends Controller
{

    public function __construct()
    {
        $this->middleware('role:admin');
    }

    public function index()
    {
        $roles = Role::get();
        return view('back.role-and-permissions.assign-permissions.index', [
            'title' => 'Assign Permission',
            'roles' => $roles
        ]);
    }

    public function create(Role $role)
    {
        $roles = Role::get();
        $permissions = Permission::get();
        return view('back.role-and-permissions.assign-permissions.create', [
            'title' => 'Assign Permission',
            'role' => $role,
            'roles' => $roles,
            'permissions' => $permissions
        ]);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'role' => 'required',
            'permissions' => 'required|array'
        ]);

        $role = Role::find($validateData['role']);
        $role->givePermissionTo($validateData['permissions']);

        Alert::success("Berhasil", "Permission telah ditetapkan untuk role $role->name");
        return redirect()->route('assign-permissions.index');
    }

    public function edit(Role $role)
    {
        $roles = Role::get();
        $permissions = Permission::get();

        return view('back.role-and-permissions.assign-permissions.edit', [
            'title' => 'Assign Permission',
            'role' => $role,
            'roles' => $roles,
            'permissions' => $permissions
        ]);
    }

    public function update(Role $role)
    {
        request()->validate([
            'role' => 'required',
            'permissions' => 'required|array'
        ]);

        $role->syncPermissions(request('permissions'));
        Alert::success("Berhasil", "Permission telah disinkronkan");
        return redirect()->route('assign-permissions.index');
    }
}
