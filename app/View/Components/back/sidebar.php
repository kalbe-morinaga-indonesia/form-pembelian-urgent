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
        $in_process = Purchase::where('status', 'in process')->get()->count();
        return view('components.back.sidebar', [
            'count_in_process' => $in_process
        ]);
    }
}
