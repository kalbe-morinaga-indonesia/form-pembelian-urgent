<?php

namespace App\Http\Controllers\Front;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Purchase;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $today = Carbon::now();
        $daily_request = Purchase::whereDay('dtmInsertedBy', $today)->get();
        $monthly_request = Purchase::whereMonth('dtmInsertedBy', $today)->get();
        $yearly_request = Purchase::whereMonth('dtmInsertedBy', $today)->get();
        return view('welcome', [
            'daily_request' => $daily_request,
            'monthly_request' => $monthly_request,
            'yearly_request' => $yearly_request,
        ]);
    }
}
