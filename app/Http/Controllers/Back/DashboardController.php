<?php

namespace App\Http\Controllers\Back;

use Carbon\Carbon;
use App\Models\Purchase;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {

        $today = Carbon::now();
        $daily_request = Purchase::whereDay('dtmInsertedBy', $today)->get();
        $monthly_request = Purchase::whereMonth('dtmInsertedBy', $today)->get();
        $yearly_request = Purchase::whereYear('dtmInsertedBy', $today)->get();

        $donuts_daily = DB::table('mpurchases')
            ->select('mdepartments.txtNamaDept', DB::raw('count(*) as total'))
            ->join('mdepartments', 'mdepartments.id', '=', 'mpurchases.mdepartment_id')
            ->whereDay('mpurchases.dtmInsertedBy', $today)
            ->groupBy('mpurchases.mdepartment_id')
            ->get();

        $donuts_monthly = DB::table('mpurchases')
            ->select('mdepartments.txtNamaDept', DB::raw('count(*) as total'))
            ->join('mdepartments', 'mdepartments.id', '=', 'mpurchases.mdepartment_id')
            ->whereMonth('mpurchases.dtmInsertedBy', $today)
            ->groupBy('mpurchases.mdepartment_id')
            ->get();

        $donuts_yearly = DB::table('mpurchases')
            ->select('mdepartments.txtNamaDept', DB::raw('count(*) as total'))
            ->join('mdepartments', 'mdepartments.id', '=', 'mpurchases.mdepartment_id')
            ->whereYear('mpurchases.dtmInsertedBy', $today)
            ->groupBy('mpurchases.mdepartment_id')
            ->get();

        $reasons = DB::select(
            "SELECT txtReason,
                    COUNT(CASE WHEN txtReason='Breakdown' THEN 1  END) As breakdown,
                    COUNT(CASE WHEN txtReason='Human Error (Miss Planning)' THEN 1  END) As 'humanError',
                    COUNT(CASE WHEN txtReason='Iddle Produksi' THEN 1  END) As 'iddleProduksi',
                    COUNT(CASE WHEN txtReason='Safety K3' THEN 1  END) As 'safetyK3',
                    COUNT(*) as total,
                    dtmInsertedBy
                    FROM mpurchases GROUP BY MONTH(`dtmInsertedBy`), YEAR(`dtmInsertedBy`)"
        );

        $result[] = ['month', 'Breakdown', 'Human Error', 'Iddle Produksi', 'Safety K3'];
        foreach ($reasons as $key => $value) {
            $month = Carbon::createFromFormat('Y-m-d H:i:s', $value->dtmInsertedBy)->format('M');
            $result[++$key] = [$month, (int)$value->breakdown, (int)$value->humanError, (int)$value->iddleProduksi, (int)$value->safetyK3];
        }

        // Report
        if (Auth()->user()->hasRole('user')) {
            $approve = Purchase::where([
                ['muser_id', Auth::user()->id],
                ['status', 'approved by dept head']
            ])->orWhere([
                ['muser_id', Auth::user()->id],
                ['status', 'approved by pu spv']
            ])->get();
            $not_approve = Purchase::where([
                ['muser_id', Auth::user()->id],
                ['status', 'rejected by dept head']
            ])->get();
            $need_to_approve = Purchase::where([
                ['muser_id', Auth::user()->id],
                ['status', 'in process']
            ])->orWhere([
                ['muser_id', Auth::user()->id],
                ['status', 'in process by buyer']
            ])->get();
        } else if (Auth()->user()->hasRole('buyer')) {
            $approve = Purchase::where('status', 'approved by pu spv')->get();
            $not_approve = Purchase::where('status', 'rejected by pu spv')->get();
            $need_to_approve = Purchase::where('status', 'in process by buyer')->get();
        } else {
            $approve = Purchase::where('status', 'approved by dept head')->get();
            $not_approve = Purchase::where('status', 'rejected by dept head')->get();
            $need_to_approve = Purchase::where('status', 'in process')->get();
        }

        return view('back.dashboard', [
            'title' => 'Dashboard',
            'daily_request' => $daily_request,
            'monthly_request' => $monthly_request,
            'yearly_request' => $yearly_request,
            'donuts_daily' => $donuts_daily,
            'donuts_monthly' => $donuts_monthly,
            'donuts_yearly' => $donuts_yearly,
            'product' => json_encode($result),
            'approve' => $approve,
            'not_approve' => $not_approve,
            'need_to_approve' => $need_to_approve
        ]);
    }
}
