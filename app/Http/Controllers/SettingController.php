<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SettingController extends Controller
{
    public function index(){
        $setting = Setting::select('intVat','id')->first();
        return view('back.setting.index',[
            'title' => "Setting",
            'setting' => $setting
        ]);
    }

    public function update(Request $request, Setting $setting){
        $request->validate([
            'intVat' => 'required'
        ]);

        Setting::where('id', $request->id)->update([
            'intVat' => $request->intVat
        ]);

        Alert::success("Berhasil", "Data VAT $request->intVat berhasil diubah");
        return redirect()->route('settings.index');
    }
}
