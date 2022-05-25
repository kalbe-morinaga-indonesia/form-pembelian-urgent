<?php

namespace App\View\Components\back;

use App\Models\Purchase;
use Illuminate\View\Component;

class sidebar extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $in_process = Purchase::where([
            ['status', 'in process'],
            ['mdepartment_id', Auth()->user()->mdepartment_id]
        ])->get()->count();
        $in_process_buyer = Purchase::where('status', 'in process by buyer')->get()->count();
        return view('components.back.sidebar', [
            'count_in_process' => $in_process,
            'count_in_process_buyer' => $in_process_buyer,
        ]);
    }
}
