<?php

namespace App\View\Components\Dashboard\Datatable;

use Illuminate\View\Component;

class ResponsiveDatatable extends Component
{
    public $dataTable;
    public $dt_title;
    public $dt_class;
    public $dt_style;
    public $dt_mainButtonAction;
    public $dt_mainButtonText;
    public $dt_columnSelectFilter;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($dataTable, $title = null, $class = null, $style = null, $buttonUrl = null, $buttonText = null, $dt_columnSelectFilter = null)
    {
        $this->dataTable = $dataTable;
        $this->dt_title = $title;
        $this->dt_class = $class;
        $this->dt_style = $style;
        $this->dt_mainButtonAction = $buttonUrl;
        $this->dt_mainButtonText = $buttonText;
        $this->dt_columnSelectFilter = $dt_columnSelectFilter;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard.datatable.responsive-datatable');
    }
}
