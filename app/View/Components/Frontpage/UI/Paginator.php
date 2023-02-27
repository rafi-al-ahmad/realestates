<?php

namespace App\View\Components\Frontpage\UI;

use Illuminate\View\Component;

class Paginator extends Component
{
    public $pagination;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($pagination)
    {
        $this->pagination = $pagination;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.frontpage.ui.paginator');
    }
}
