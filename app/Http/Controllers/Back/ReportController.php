<?php

namespace App\Http\Controllers\Back;

use App\Models\Purchase;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function index()
    {

        if (Auth()->user()->hasRole('user')) {
            $approve = Purchase::where([
                ['muser_id', Auth::user()->id],
                ['status', 'approved by dept head']
            ])->get();
            $not_approve = Purchase::where([
                ['muser_id', Auth::user()->id],
                ['status', 'rejected by dept head']
            ])->get();
            $need_to_approve = Purchase::where([
                ['muser_id', Auth::user()->id],
                ['status', 'in process']
            ])->get();
        } else {
            $approve = Purchase::where('status', 'approved by dept head')->get();
            $not_approve = Purchase::where('status', 'rejected by dept head')->get();
            $need_to_approve = Purchase::where('status', 'in process')->get();
        }

        return view('back.report.index', [
            'title' => 'Report',
            'approve' => $approve,
            'not_approve' => $not_approve,
            'need_to_approve' => $need_to_approve
        ]);
    }
}
