<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckPurchaseUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // $purchases = Purchase::get();
        // foreach ($purchases as $purchase) {
        //     if ($purchase->muser_id == Auth::user()->id) {
        //         return $next($request);
        //     } else {
        //         return abort(403);
        //     }
        // }
    }
}
