<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class sidecalendar extends Component
{
    public $upcoming;
    /**
     * 
     * Create a new component instance.
     */
    public function __construct($upcoming)
    {
        //
        $this->$upcoming=$upcoming;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.side-calendar');
    }
}
