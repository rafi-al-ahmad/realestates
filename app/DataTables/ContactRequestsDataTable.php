<?php

namespace App\DataTables;

use App\Models\ContactRequest;
use App\Traits\DatatableHelpers;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ContactRequestsDataTable extends DataTable
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
            ->setRowId('id')
            ->rawColumns([
                'action',
            ])
            ->editColumn('created_at', function ($record) {
                return $record->created_at ? with(new Carbon($record->created_at))->format('Y-m-d H:i') : '';
            })
            ->addIndexColumn();
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\ContactRequest $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(ContactRequest $model): QueryBuilder
    {
        return $model->newQuery()->orderBy('id', 'desc');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('contactrequests-table')
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
                "initComplete" => "",
                'buttons' => [],
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
            Column::make('phone')
                ->addClass('text-center')
                ->title(__('phone'))
                ->orderable(false),
            Column::make('email')
                ->addClass('text-center')
                ->title(__('email'))
                ->orderable(false),
            Column::make('subject')
                ->addClass('text-center')
                ->title(__('subject'))
                ->orderable(false),
            Column::make('message')
                ->addClass('text-center')
                ->title(__('message'))
                ->orderable(false),
            Column::make('created_at')
                ->addClass('text-center')
                ->orderable(false),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'ContactRequests_' . date('YmdHis');
    }
}
