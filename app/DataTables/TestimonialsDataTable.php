<?php

namespace App\DataTables;

use App\Models\Testimonial;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class TestimonialsDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->rawColumns([
                'status',
                'action',
                'row-order',
                'featured',
                "select",
                'translation',
                'control'
            ])
            ->addColumn('action', 'admin.pages.testimonials.actions')
            ->setRowId('id')
            ->editColumn('status', function ($record) {
                return "<button row-id='" . $record->id . "' class='btn btn-light mb-0' onclick='updateStatus(this)' row-status='" . $record->status . "' style='color:" . ($record->status == 0 ? "#f5365c" : "#00ef07") . ";box-shadow: unset; background-color: #ffffff00;' ><i style='font-size: 10px; ' class='fa-solid fa-circle'></i> <span class='status-text'>" . ($record->status == 0 ? __("inactive") : __("active")) . '</span></button class="btn btn-light">'; // $record->status == 0 ? "" : '';
            })
            ->editColumn('featured', function ($record) {
                return "<button row-id='" . $record->id . "' class='btn btn-light mb-0' onclick='updateFeaturedStatus(this)' row-featured-status='" . $record->featured . "' style='color:" . ($record->featured == 0 ? "#f5365c" : "#00ef07") . ";box-shadow: unset; background-color: #ffffff00; font-size: 15px;' > <span class='featured-text'>" . ($record->featured == 0 ? "<i class='fa-solid fa-circle-xmark'></i>" : "<i class='fa-solid fa-circle-check'></i>") . '</span></button class="btn btn-light">';
            })
            ->setRowId(function ($record) {
                return 'row_' . $record->id;
            })
            ->editColumn('control', function ($record) {
                return "";
            })
            ->editColumn('translation', function ($record) {
                $recordLocales = array_keys($record->getTranslations('text'));
                $buttonsList = "";
                foreach ($recordLocales as $locale) {
                    if (App::currentLocale() == $locale) {
                        continue;
                    }
                    $buttonsList .= '<a href="' . route('testimonials.update', ["id" => $record->id, "locale" => $locale]) . '" class="btn btn-light m-1 px-2 py-1 shadow-card bg-gradient-faded-success-vertical">' . strtoupper($locale) . '</a>';
                }
                $interfaceLanguages = activeLanguages();
                foreach ($interfaceLanguages as $language) {
                    if (App::currentLocale() == $language->code) {
                        continue;
                    }
                    if (!in_array($language->code, $recordLocales)) {
                        $buttonsList .= '<a href="' . route('testimonials.update', ["id" => $record->id, "locale" => $language->code]) . '" class="btn btn-light m-1 px-2 py-1 shadow-card bg-gradient-faded-danger-vertical">' . strtoupper($language->code) . '</a>';
                    }
                }
                return ($buttonsList);
            })
            ->editColumn('row-order', function ($record) {
                return "<i row-id=" . $record->id . " class='fa-solid fa-sort'></i>";
            })
            ->addColumn('select', function ($record) {
                return "<input name='selected_rows' class='form-check-input' type='checkbox' value='" . $record->id . "'>";
            })
            ->addIndexColumn();
    }


    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Testimonial $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Testimonial $model): QueryBuilder
    {
        return $model->newQuery()->orderBy("order", "asc");
    }


    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('testimonials-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('<"row me-2"' .
                '<"col-md-2"<"me-3"l>>' .
                '<"col-md-10"<"dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-end flex-md-row flex-column mb-3 mb-md-0"fB>>' .
                '>tr' .
                '<"row mx-2"' .
                '<"col-sm-12 col-md-6"i>' .
                '<"col-sm-12 col-md-6"p>' .
                '>')
            ->orderBy(1)
            ->parameters([
                'responsive' => true,
                'autoWidth' => false,
                'lengthMenu' => [[10, 25, 50, 100], ['10', '25', '50', '100']],

                "order" => [],
                "rowReorder" => [
                    "update" => false,
                    "dataSrc" => 'order',
                    "selector" => 'td.orderable'
                ],
                'buttons' => [
                    [
                        "extend" => "collection",
                        "text" => __("actions"),
                        "order" => [[5]],
                        "className" => "btn bg-gradient-primary btn-sm dropdown-toggle",
                        "buttons" => [
                            [
                                'extend' => 'collection',
                                "text" => __("status"),
                                "buttons" => [
                                    [
                                        "text" => __("activate"),
                                        "action" => '
                                        function(e, dt, node, config) {
                                            updateSelectedRecordsStatus(1);
                                        }'
                                    ],
                                    [
                                        "text" =>  __("deactivate"),
                                        "action" => '
                                        function(e, dt, node, config) {
                                            updateSelectedRecordsStatus(0);
                                        }'
                                    ],
                                ],
                            ],
                            [
                                "text" => __("delete"),
                                "action" => '
                                        function(e, dt, node, config) {
                                            ids = [];
                                            $("input:checkbox[name=selected_rows]:checked").each(function() {
                                                ids.push($(this).val());
                                            });
                                            deleteRows(ids);
                                        }'
                            ],
                        ],
                    ],
                ],
                "language" => [
                    'paginate' => [
                        'previous' => '<i class="fa-solid fa-angle-left"></i>',
                        'next' => '<i class="fa-solid fa-angle-right"></i>'
                    ]
                ]
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
                ->addClass('control'),
            Column::computed('DT_RowIndex')
                ->title('#')
                ->exportable(false)
                ->printable(false)
                ->searchable(false)
                ->orderable(false)
                ->addClass('text-center DT_RowIndex w-1'),
            Column::make('name')
                ->title(__('name'))
                ->addClass('text-center')
                ->orderable(false),
            Column::make('surname')
                ->title(__('surname'))
                ->addClass('text-center')
                ->orderable(false),
            Column::make('mobile_phone')
                ->title(__('phone'))
                ->addClass('text-center')
                ->orderable(false),
            Column::make('email')
                ->addClass('text-center')
                ->title(__('email'))
                ->orderable(false),
            Column::make('status')
                ->title(__('status'))
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
        return 'Testimonials_' . date('YmdHis');
    }
}
