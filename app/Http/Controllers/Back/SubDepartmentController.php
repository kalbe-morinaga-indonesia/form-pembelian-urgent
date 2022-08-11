<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubDepartmentController extends Controller
{
    public function index()
    {
        return view('back.subdepartment.index', [
            'title' => 'Sub Department'
        ]);
    }
}
