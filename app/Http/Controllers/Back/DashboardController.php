<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Purchase;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $today = Carbon::now();
        $daily_request = Purchase::whereDay('dtmInsertedBy', $today)->get();
        $monthly_request = Purchase::whereMonth('dtmInsertedBy', $today)->get();
        $yearly_request = Purchase::whereMonth('dtmInsertedBy', $today)->get();
        return view('back.dashboard', [
            'title' => 'Dashboard',
            'daily_request' => $daily_request,
            'monthly_request' => $monthly_request,
            'yearly_request' => $yearly_request,
        ]);
    }
}
