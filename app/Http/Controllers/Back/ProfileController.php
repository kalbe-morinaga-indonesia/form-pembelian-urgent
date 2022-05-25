<?php

namespace App\Http\Controllers\Back;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Symfony\Component\HttpKernel\Profiler\Profile;

class ProfileController extends Controller
{
    public function index()
    {
        $userid = Auth()->user()->id;
        $user = User::where('id', $userid)->first();
        return view('back.profile.index', [
            'title' => 'Profile',
            'user' => $user
        ]);
    }

    public function update(Request $request)
    {
        User::where('id', Auth()->user()->id)->update([
            'txtNama' => $request->txtNama,
            'txtNoHp' => $request->txtNoHp,
            'txtTempatLahir' => $request->txtTempatLahir,
            'dtmTanggalLahir' => $request->dtmTanggalLahir,
        ]);

        Alert::success("Berhasil", "Profile $request->txtNama berhasil diubah");
        return redirect()->route('profile');
    }
}
