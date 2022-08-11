<?php

namespace App\Http\Controllers\Back;

use App\Models\User;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware(['role:admin']);
    }

    public function index()
    {
        $users = User::get();
        return view('back.users.index', [
            'title' => 'Users',
            'users' => $users
        ]);
    }

    public function create(User $user)
    {
        $departments = Department::get();
        return view('back.users.create', [
            'title' => 'Users',
            'user' => $user,
            'departments' => $departments
        ]);
    }

    public function store(UserRequest $request)
    {
        User::create([
            'txtNik' =>  $request->txtNik,
            'txtUsername' => $request->txtUsername,
            'txtNama' =>  $request->txtNama,
            'txtNoHp' =>  $request->txtNoHp,
            'txtTempatLahir' =>  $request->txtTempatLahir,
            'dtmTanggalLahir' =>  $request->dtmTanggalLahir,
            'txtPassword' =>  Hash::make($request->txtPassword),
            'txtAlamat' =>  $request->txtAlamat,
            'mdepartment_id' =>  $request->mdepartment_id,
            'txtInsertedBy' => Auth::user()->txtNama,
            'txtUpdatedBy' => Auth::User()->txtNama
        ]);

        Alert::success("Berhasil", "Data user $request->txtNama berhasil ditambahkan");
        return redirect()->route('users.index');
    }

    public function edit(User $user)
    {
        $departments = Department::get();
        return view('back.users.edit', [
            'title' => 'Users',
            'user' => $user,
            'departments' => $departments
        ]);
    }

    public function update(UserRequest $request, User $user)
    {

        User::where('id', $user->id)->update([
            'txtNama' =>  $request->txtNama,
            'txtNoHp' =>  $request->txtNoHp,
            'txtTempatLahir' =>  $request->txtTempatLahir,
            'dtmTanggalLahir' =>  $request->dtmTanggalLahir,
            'txtAlamat' =>  $request->txtAlamat,
            'mdepartment_id' =>  $request->mdepartment_id,
        ]);

        Alert::success("Berhasil", "Data user $request->txtNama berhasil diubah");
        return redirect()->route('users.index');
    }

    public function destroy(User $user)
    {
        $user->delete();
        Alert::success("Berhasil", "Data user $user->txtNama berhasil dihapus");
        return redirect()->route('users.index');
    }
}
