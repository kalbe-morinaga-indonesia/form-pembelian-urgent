<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LokasiController extends Controller
{
    public function index()
    {
        return view('back.lokasi.index',[
            'title' => 'Lokasi'
        ]);
    }
}
