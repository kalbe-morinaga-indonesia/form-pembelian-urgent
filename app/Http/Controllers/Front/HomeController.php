<?php

namespace App\Http\Controllers\Front;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $today = Carbon::now();
        $daily_request = Purchase::whereDay('dtmInsertedBy', $today)->get();
        $monthly_request = Purchase::whereMonth('dtmInsertedBy', $today)->get();
        $yearly_request = Purchase::whereMonth('dtmInsertedBy', $today)->get();

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

        return view('welcome', [
            'daily_request' => $daily_request,
            'monthly_request' => $monthly_request,
            'yearly_request' => $yearly_request,
            'donuts_daily' => $donuts_daily,
            'donuts_monthly' => $donuts_monthly,
            'donuts_yearly' => $donuts_yearly,
            'product' => json_encode($result)
        ]);
    }
}
