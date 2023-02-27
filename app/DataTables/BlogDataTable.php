<?php

namespace App\DataTables;

use App\Models\Article;
use App\Traits\DatatableHelpers;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class BlogDataTable extends DataTable
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
            ->addColumn('action', 'dashboard.pages.blog.action')
            ->rawColumns([
                'action',  "select", "status", 'featured', 'control', 'language'
            ])
            ->editColumn('status', function ($record) {
                return '<span class="badge ' . ($record->status == 1 ? 'bg-label-success' : 'bg-label-danger') . '" text-capitalized>' . ($record->status == 1 ? __('active') : __('inactive')) . '</span>';
            })
            ->editColumn('language', function ($record) {
                return '<button type="button" disabled class="btn btn-light m-1 px-2 py-1 shadow-card bg-gradient-faded-secondary-vertical">' . strtoupper($record->language) . '</button>';
            })
            ->editColumn('featured', function ($record) {
                return "<span row-id='" . $record->id . "' class='btn-light mb-0' onclick='updateFeaturedStatus(this)' row-featured-status='" . $record->featured . "' style='color:" . ($record->featured == 0 ? "#f5365c" : "#00ef07") . ";box-shadow: unset; background-color: #ffffff00; font-size: 15px;' > <span class='featured-text'>" . ($record->featured == 0 ? "" : "<i class='fa-solid fa-circle-check'></i>") . '</span></span class="btn btn-light">';
            })
            ->setRowId(function ($record) {
                return 'row_' . $record->id;
            })
            ->editColumn('control', function ($record) {
                return "";
            })
            ->addIndexColumn();
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Article $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Article $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('blog-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom(
                '<"row me-2"' .
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
                }
                ",
                'buttons' => [
                    [
                        "text" => '<i class="ti ti-plus me-0 me-sm-1 ti-xs"></i><span class="d-none d-sm-inline-block">' . __("Add New Article") . '</span>',
                        "className" => 'add-new btn btn-primary ms-3',
                        "action" => "function () {
                            window.location.href = '" . route('blogs.create') . "';
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
                ->title("")
                ->exportable(false)
                ->printable(false)
                ->searchable(false)
                ->orderable(false)
                ->addClass('text-center px-1 w-1'),
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
            Column::make('date')
                ->title(__('date'))
                ->addClass('text-center')
                ->orderable(false),
                Column::make('status')
                ->title(__('status'))
                ->addClass('text-center')
                ->orderable(false),
                Column::make('featured')
                ->title(__('featured'))
                ->addClass('text-center')
                ->orderable(false),
            Column::make('language')
                ->title(__('language'))
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
        return 'Blog_' . date('YmdHis');
    }
}
