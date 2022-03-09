<?php

namespace App\View\Components\form;

use Illuminate\View\Component;

class label extends Component
{

    public $for;
    public $label;

    public function __construct($for, $label)
    {
        $this->for = $for;
        $this->label = $label;
    }

    public function render()
    {
        return view('components.form.label');
    }
}
