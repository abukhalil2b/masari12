<?php

namespace App\View\Components\Svgicon;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RoundProgress extends Component
{
    public $percentage;

    public function __construct($percentage = 21)
    {
        $this->percentage = min(max($percentage, 0), 100); // Ensure 0-100%
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
         $radius = 27.5;
        $circumference = 2 * pi() * $radius;
        $dashoffset = $circumference * (1 - ($this->percentage / 100));

        return view('components.svgicon.round-progress', [
            'percentage' => $this->percentage,
            'dashoffset' => $dashoffset,
            'circumference' => $circumference,
            'radius' => $radius,
        ]);
    }
}
