<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Registration extends Component
{
    public $type;
    public $label;
    public $name;
    public $value;

    /**
     * Create a new component instance.
     */
    public function __construct($type,$name, $label, $value)
    {
        $this->type = $type;
       $this->name = $name;
       $this->label = $label;
       $this->value = $value;

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.registration');
    }
}
