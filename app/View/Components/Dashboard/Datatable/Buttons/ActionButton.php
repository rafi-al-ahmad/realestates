<?php

namespace App\View\Components\Dashboard\Datatable\Buttons;

use Illuminate\View\Component;

class ActionButton extends Component
{
    public $type;
    public $action;
    public $btnType;
    public $class;
    public $title;
    public $rowId;
    public $id;
    public $icon;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        $btnType,
        $icon,
        $type = null,
        $action = null,
        $class = null,
        $title = null,
        $rowId = null,
        $id = null,
    ) {
        $this->type = $type;
        $this->action = $action;
        $this->btnType = $btnType;
        $this->class = $class;
        $this->title = $title;
        $this->rowId = $rowId;
        $this->id = $id;
        $this->icon = $icon;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard.datatable.buttons.action-button');
    }
}
