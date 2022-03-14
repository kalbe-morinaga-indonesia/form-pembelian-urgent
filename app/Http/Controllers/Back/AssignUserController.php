<?php

namespace App\Http\Controllers\Back;

use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class AssignUserController extends Controller
{

    public function __construct()
    {
        $this->middleware('role:admin');
    }

    public function index()
    {
        $users = User::has('roles')->get();
        return view('back.role-and-permissions.assign-user.index', [
            'title' => 'Assign User',
            'users' => $users
        ]);
    }

    public function create(User $user)
    {
        $roles = Role::get();
        $users = User::get();
        return view('back.role-and-permissions.assign-user.create', [
            'title' => 'Assign User',
            'roles' => $roles,
            'user' => $user,
            'users' => $users
        ]);
    }

    public function store()
    {
        request()->validate([
            'txtUsername' => 'required',
            'roles' => 'array|required'
        ]);

        $user = User::where('txtUsername', request('txtUsername'))->first();
        $user->assignRole(request('roles'));

        Alert::success("Berhasil", "Role telah ditetapkan ke pengguna $user->name");
        return redirect()->route('assign-users.index');
    }

    public function edit(User $user)
    {
        $roles = Role::get();
        return view('back.role-and-permissions.assign-user.edit', [
            'title' => 'Assign User',
            'user' => $user,
            'roles' => $roles
        ]);
    }

    public function update(User $user)
    {
        $user->syncRoles(request('roles'));

        Alert::success("Berhasil", "Rule telah disinkronkan ke {$user->txtNama}");

        return redirect()->route('assign-users.index');
    }
}
