<?php

namespace App\View\Components\form;

use Illuminate\View\Component;

class input extends Component
{

    public $name;
    public $id;
    public $type;
    public $value;
    public $placeholder;
    public $isReadOnly;

    public function __construct($name = "", $id = "", $type = "", $value = "", $placeholder = "", $isReadOnly = "")
    {
        $this->name = $name;
        $this->id = $id;
        $this->type = $type;
        $this->value = $value;
        $this->placeholder = $placeholder;
        $this->isReadOnly = $isReadOnly;
    }

    public function render()
    {
        return view('components.form.input');
    }
}
