<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PageHeaders extends Component
{
    public $title;
    public array $breadcrumbs;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $breadcrumbs = [])
    {
        $this->title = $title;
        $this->breadcrumbs = $breadcrumbs;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.page-headers');
    }
}
