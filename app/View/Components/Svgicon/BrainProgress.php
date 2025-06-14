<?php

namespace App\View\Components\Svgicon;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BrainProgress extends Component
{
    public $percentage;
    public $height;
    public $width;
public $barHeight;

    public function __construct($percentage = 0, $height = 60, $width = 64)
    {
        $this->percentage = min(max($percentage, 0), 100);
        $this->height = $height;
        $this->width = $width;
        $this->barHeight = $this->calculateBarHeight();
    }

    public function calculateBarHeight()
    {
        // 11.2px was the original height at some percentage
        // Adjust this calculation based on your needs
        return ($this->percentage / 100) * 55; // 55 is the container height
    }

    public function render()
    {
        return view('components.svgicon.brain-progress');
    }
}
