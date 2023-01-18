<?php

namespace App\View\Components\Dashboard\Menu;

use Illuminate\View\Component;

class Menu extends Component
{
    public $menuData;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->menuData = config('dashboard.menu');
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard.menu.menu');
    }
}
