<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Property extends Component
{
    // 1. Declare the variable publicly
    public $property;

    // 2. Accept it in the constructor method
    public function __construct($property)
    {
        $this->property = $property;
    }

    public function render(): View|Closure|string
    {
        return view('components.property');
    }
}
