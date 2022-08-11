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
        $user_department = Auth()->user()->mdepartment_id;
        $daily_request = Purchase::whereDay('dtmInsertedBy', $today)
            ->get();

        $monthly_request = Purchase::whereMonth('dtmInsertedBy', $today)
            ->get();

        $yearly_request = Purchase::whereYear('dtmInsertedBy', $today)
            ->get();

        if (Auth()->user()->hasRole('user')){
            $daily_request = Purchase::whereDay('dtmInsertedBy', $today)
            ->where('mdepartment_id', $user_department)
            ->get();

            $monthly_request = Purchase::whereMonth('dtmInsertedBy', $today)
            ->where('mdepartment_id', $user_department)
            ->get();


            $yearly_request = Purchase::whereYear('dtmInsertedBy', $today)
            ->where('mdepartment_id', $user_department)
            ->get();

            $donuts_daily = DB::table('mpurchases')
            ->select('mdepartments.txtNamaDept', DB::raw('count(*) as total'))
            ->join('mdepartments', 'mdepartments.id', '=', 'mpurchases.mdepartment_id')
            ->whereDay('mpurchases.dtmInsertedBy', $today)
            ->where('mdepartment_id', $user_department)
            ->groupBy('mpurchases.mdepartment_id')
            ->get();

            $donuts_daily_reason = DB::table('mpurchases')
            ->select('mdepartments.txtNamaDept', 'mpurchases.txtReason', DB::raw('count(*) as total'))
            ->join('mdepartments', 'mdepartments.id', '=', 'mpurchases.mdepartment_id')
            ->whereDay('mpurchases.dtmInsertedBy', $today)
                ->where('mdepartment_id', $user_department)
            ->orderBy('mpurchases.mdepartment_id', 'asc')
            ->groupBy('mpurchases.txtReason', 'mpurchases.mdepartment_id')
            ->get();

            $donuts_monthly = DB::table('mpurchases')
            ->select('mdepartments.txtNamaDept', 'mpurchases.txtReason', DB::raw('count(*) as total'))
            ->join('mdepartments', 'mdepartments.id', '=', 'mpurchases.mdepartment_id')
            ->whereMonth('mpurchases.dtmInsertedBy', $today)
                ->where('mdepartment_id', $user_department)
            ->groupBy('mpurchases.mdepartment_id')
            ->get();

            $donuts_monthly_reason = DB::table('mpurchases')
            ->select('mdepartments.txtNamaDept', 'mpurchases.txtReason', DB::raw('count(*) as total'))
            ->join('mdepartments', 'mdepartments.id', '=', 'mpurchases.mdepartment_id')
            ->whereMonth('mpurchases.dtmInsertedBy', $today)
                ->where('mdepartment_id', $user_department)
            ->orderBy('mpurchases.mdepartment_id', 'asc')
            ->groupBy('mpurchases.txtReason', 'mpurchases.mdepartment_id')
            ->get();

            // dd($donuts_monthly_reason);

            $donuts_yearly = DB::table('mpurchases')
            ->select('mdepartments.txtNamaDept', DB::raw('count(*) as total'))
            ->join('mdepartments', 'mdepartments.id', '=', 'mpurchases.mdepartment_id')
            ->whereYear('mpurchases.dtmInsertedBy', $today)
                ->where('mdepartment_id', $user_department)
            ->groupBy('mpurchases.mdepartment_id')
            ->get();

            $donuts_yearly_reason = DB::table('mpurchases')
            ->select('mdepartments.txtNamaDept', 'mpurchases.txtReason', 'mpurchases.dtmInsertedBy', DB::raw('count(*) as total'))
            ->join('mdepartments', 'mdepartments.id', '=', 'mpurchases.mdepartment_id')
            ->whereYear('mpurchases.dtmInsertedBy', $today)
                ->where('mdepartment_id', $user_department)
            ->orderBy('mpurchases.mdepartment_id', 'asc')
            ->groupBy('mpurchases.txtReason', 'mpurchases.mdepartment_id')
            ->get();
        }else{
        $donuts_daily = DB::table('mpurchases')
            ->select('mdepartments.txtNamaDept', DB::raw('count(*) as total'))
            ->join('mdepartments', 'mdepartments.id', '=', 'mpurchases.mdepartment_id')
            ->whereDay('mpurchases.dtmInsertedBy', $today)
            ->groupBy('mpurchases.mdepartment_id')
            ->get();

        $donuts_daily_reason = DB::table('mpurchases')
            ->select('mdepartments.txtNamaDept', 'mpurchases.txtReason', DB::raw('count(*) as total'))
            ->join('mdepartments', 'mdepartments.id', '=', 'mpurchases.mdepartment_id')
            ->whereDay('mpurchases.dtmInsertedBy', $today)
            ->orderBy('mpurchases.mdepartment_id', 'asc')
            ->groupBy('mpurchases.txtReason', 'mpurchases.mdepartment_id')
            ->get();

        $donuts_monthly = DB::table('mpurchases')
            ->select('mdepartments.txtNamaDept', 'mpurchases.txtReason', DB::raw('count(*) as total'))
            ->join('mdepartments', 'mdepartments.id', '=', 'mpurchases.mdepartment_id')
            ->whereMonth('mpurchases.dtmInsertedBy', $today)
            ->groupBy('mpurchases.mdepartment_id')
            ->get();

        $donuts_monthly_reason = DB::table('mpurchases')
            ->select('mdepartments.txtNamaDept', 'mpurchases.txtReason', DB::raw('count(*) as total'))
            ->join('mdepartments', 'mdepartments.id', '=', 'mpurchases.mdepartment_id')
            ->whereMonth('mpurchases.dtmInsertedBy', $today)
            ->orderBy('mpurchases.mdepartment_id', 'asc')
            ->groupBy('mpurchases.txtReason', 'mpurchases.mdepartment_id')
            ->get();

        // dd($donuts_monthly_reason);


        $donuts_yearly = DB::table('mpurchases')
            ->select('mdepartments.txtNamaDept', DB::raw('count(*) as total'))
            ->join('mdepartments', 'mdepartments.id', '=', 'mpurchases.mdepartment_id')
            ->whereYear('mpurchases.dtmInsertedBy', $today)
            ->groupBy('mpurchases.mdepartment_id')
            ->get();

        $donuts_yearly_reason = DB::table('mpurchases')
            ->select('mdepartments.txtNamaDept', 'mpurchases.txtReason', 'mpurchases.dtmInsertedBy', DB::raw('count(*) as total'))
            ->join('mdepartments', 'mdepartments.id', '=', 'mpurchases.mdepartment_id')
            ->whereYear('mpurchases.dtmInsertedBy', $today)
            ->orderBy('mpurchases.mdepartment_id', 'asc')
            ->groupBy('mpurchases.txtReason', 'mpurchases.mdepartment_id')
            ->get();

        }

        $reasons = DB::select(
            "SELECT txtReason,
                    COUNT(CASE WHEN txtReason='Breakdown' THEN 1  END) As breakdown,
                    COUNT(CASE WHEN txtReason='Human Error (Miss Planning)' THEN 1  END) As 'humanError',
                    COUNT(CASE WHEN txtReason='Iddle Produksi' THEN 1  END) As 'iddleProduksi',
                    COUNT(CASE WHEN txtReason='Safety K3' THEN 1  END) As 'safetyK3',
                    COUNT(*) as total,
                    dtmInsertedBy
                    FROM mpurchases WHERE mdepartment_id = $user_department GROUP BY MONTH(`dtmInsertedBy`), YEAR(`dtmInsertedBy`)"
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
            'donuts_daily_reason' => $donuts_daily_reason,
            'donuts_monthly' => $donuts_monthly,
            'donuts_monthly_reason' => $donuts_monthly_reason,
            'donuts_yearly' => $donuts_yearly,
            'donuts_yearly_reason' => $donuts_yearly_reason,
            'product' => json_encode($result),
            'approve' => $approve,
            'not_approve' => $not_approve,
            'need_to_approve' => $need_to_approve
        ]);
    }
}
