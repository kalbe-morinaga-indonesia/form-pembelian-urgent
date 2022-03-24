<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Purchase;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $approve = Purchase::where('status', 'approved by dept head')->get();
        $not_approve = Purchase::where('status', 'rejected by dept head')->get();
        $need_to_approve = Purchase::where('status', 'in process')->get();
        return view('back.report.index', [
            'title' => 'Report',
            'approve' => $approve,
            'not_approve' => $not_approve,
            'need_to_approve' => $need_to_approve
        ]);
    }
}
