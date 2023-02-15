<?php

namespace App\View\Components\Frontpage\UI;

use Illuminate\View\Component;

class PropertiesListFilter extends Component
{
    public $buildingAge;
    public $features;
    public $propertyType;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        $buildingAge,
        $features,
        $propertyType
    ) {
        $this->buildingAge = $buildingAge;
        $this->features = $features;
        $this->propertyType = $propertyType;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.frontpage.ui.properties-list-filter');
    }
}
