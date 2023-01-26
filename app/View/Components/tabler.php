<?php

namespace App\View\Components;

use Illuminate\View\Component;

class tabler extends Component
{
    public $icon;
    public $strokeWidth;
    public $class;
    public int $w;
    public int $h;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($icon, $strokeWidth=null, $class=null, $w=24, $h=24)
    {
        $this->icon = $icon;
        $this->strokeWidth = $strokeWidth;
        $this->class = $class;
        $this->w = $w;
        $this->h = $h;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.tabler');
    }
}
