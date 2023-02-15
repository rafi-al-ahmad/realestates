<?php

namespace App\View\Components\Frontpage\UI;

use Illuminate\View\Component;

class FeaturedProperties extends Component
{

    public $properties;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($properties)
    {
        $this->properties = $properties;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.frontpage.ui.featured-properties');
    }
}
