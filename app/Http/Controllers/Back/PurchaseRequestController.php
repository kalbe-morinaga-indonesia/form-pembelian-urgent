<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;

class PurchaseRequestController extends Controller
{
    public function create()
    {
        $departments = Department::get();
        return view('back.purchase.create', [
            'title' => 'Purchase Request',
            'departments' => $departments
        ]);
    }
}
