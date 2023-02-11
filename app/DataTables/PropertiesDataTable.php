<?php

namespace App\DataTables;

use App\Models\Property;
use App\Traits\DatatableHelpers;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PropertiesDataTable extends DataTable
{
    use DatatableHelpers;
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', 'dashboard.pages.properties.action')
            ->rawColumns([
                'action', 'row-order', "select", 'status', 'language', 'control',
                'category',
                'property_type',
                'housing_type',
                'agent',
            ])
            ->editColumn('control', function ($record) {
                return "";
            })
            ->editColumn('status', function ($record) {
                return '<span class="badge ' . ($record->status == 1 ? 'bg-label-success' : 'bg-label-danger') . '" text-capitalized>' . ($record->status == 1 ? __('active') : __('inactive')) . '</span>';
            })
            ->editColumn('category', function ($record) {
                return $record->category?->title;
            })
            ->editColumn('property_type', function ($record) {
                return $record->propertyType?->title;
            })
            ->editColumn('housing_type', function ($record) {
                return $record->housingType?->title;
            })
            ->editColumn('agent', function ($record) {
                return $record->agent?->name .' '. $record->agent?->surname;
            })
            ->setRowId(function ($record) {
                return $this->type."-".$record->id;
            })
            ->addIndexColumn();
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Property $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Property $model): QueryBuilder
    {
        return $model->with(['agent', 'category', 'propertyType', 'housingType'])->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('properties-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            // ->ajax([
            //     'data' => 'function(data) {
            //         data.type = "'.$this->type.'"
            //     }'
            // ])
            ->dom(
                '<"dt-toolbar"><"row me-2"' .
                    '<"col-md-2"<"me-3"l>>' .
                    '<"col-md-10"<"dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-end flex-md-row flex-column mb-3 mb-md-0"fB>>' .
                    '>tr' .
                    '<"row mx-2"' .
                    '<"col-sm-12 col-md-6"i>' .
                    '<"col-sm-12 col-md-6"p>' .
                    '>'
            )
            ->orderBy(1)
            ->parameters([
                'responsive' => true,
                'autoWidth' => false,
                'lengthMenu' => [[10, 25, 50, 100], ['10', '25', '50', '100']],
                "order" => [],
                "initComplete" => "function () {
                                $('.dataTables_filter .form-control').removeClass('form-control-sm');
                                $('.dataTables_length .form-select').removeClass('form-select-sm');
                                //$('div.dt-toolbar').html('<b>Custom tool bar! Text/images etc.</b>');
                        }
                        ",
                'buttons' => [
                    [
                        "text" => '<i class="ti ti-plus me-0 me-sm-1 ti-xs"></i><span class="d-none d-sm-inline-block">' . __("New listing") . '</span>',
                        "className" => 'add-new btn btn-primary ms-3',
                        "action" => "function () {
                                    window.location.href = '" . route('properties.create') . "';
                                }"

                    ]
                ],
                "language" => $this->getTranslations()
            ]);
    }

    /**
     * Get the dataTable columns definition.
     *
     * @return array
     */
    public function getColumns(): array
    {
        return [
            Column::computed('control')
                ->title('')
                ->exportable(false)
                ->printable(false)
                ->responsivePriority(2)
                ->searchable(false)
                ->orderable(false)
                ->addClass('control dtr-hidden'),
            Column::computed('DT_RowIndex')
                ->title('#')
                ->exportable(false)
                ->printable(false)
                ->searchable(false)
                ->orderable(false)
                ->addClass('text-center DT_RowIndex w-1'),
            Column::make('title')
                ->title(__('title'))
                ->addClass('text-center')
                ->orderable(false),
            Column::make('views')
                ->title(__('views'))
                ->addClass('text-center')
                ->orderable(false),
            Column::make('category')
                ->title(__('category'))
                ->addClass('text-center')
                ->orderable(false),
            Column::make('property_type')
                ->title(__('property_type'))
                ->addClass('text-center')
                ->orderable(false),
            Column::make('housing_type')
                ->title(__('housing_type'))
                ->addClass('text-center')
                ->orderable(false),
            Column::make('agent')
                ->title(__('agent'))
                ->addClass('text-center')
                ->orderable(false),
            Column::make('status')
                ->addClass('text-center')
                ->orderable(false),
            Column::computed('action')
                ->addClass('text-center')
                ->title(__('actions'))
                ->exportable(false)
                ->orderable(false)
                ->printable(false)
                ->addClass('text-center')
                ->searchable(false),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Properties_' . date('YmdHis');
    }
}
