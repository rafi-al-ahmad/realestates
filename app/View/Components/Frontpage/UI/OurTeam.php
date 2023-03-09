<?php

namespace App\View\Components\Frontpage\UI;

use Illuminate\View\Component;

class OurTeam extends Component
{
    public $agents;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($agents)
    {
        $this->agents = $agents;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.frontpage.ui.our-team');
    }
}
