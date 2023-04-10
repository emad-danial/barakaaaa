<?php

namespace App\DataTables;


use App\models\Umrah;
use Yajra\DataTables\Services\DataTable;


class HajjBrokerDatatable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', 'admindatatable.action')
            ->addColumn('show', 'broker.hajjs.btn.show')
            ->rawColumns([
                'show',

            ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\AdminDatatable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        return Umrah::query()->where('package_type','hajj');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            // ->addAction(['width' => '80px'])
            // ->parameters($this->getBuilderParameters());
            ->parameters([
                'dom'        => 'Blfrtip',
                'lengthMenu' => [[10,25,50,100], [10,25,50, 'All']],
                'buttons'    =>[


                    ['extend'   => 'print', 'className' => 'btn btn-primary',
                        'text' => '<i class="fa fa-print"></i>'],
                    ['extend'   => 'csv', 'className' => 'btn btn-info',
                        'text' => '<i class="fa fa-file"></i> '. 'csv'],
                    ['extend'   => 'excel', 'className' => 'btn btn-success',
                        'text' => '<i class="fa fa-file"></i> '. 'excel'],
                    ['extend'   => 'reload', 'className' => 'btn btn-default',
                        'text' => '<i class="fa fa-refresh"></i> '],
                ],
                'initComplete' => " function () {
                            this.api().columns([1,2,3,4,5]).every(function() {
                                    var column = this;
                                    var input = document.createElement(\"input\");
                                    $(input).appendTo($(column.footer()).empty())
                                    .on('keyup', function() {
                                            column.search($(this).val(), false, false, true).draw();
                                        });
                                    });
                            }",
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            [
                'name'  => 'id',
                'data'  => 'id',
                'title' => 'ID',
            ],[
                'name'  => 'name',
                'data'  => 'name',
                'title' => 'Name',
            ],[
                'name'  => 'start_date',
                'data'  => 'start_date',
                'title' => 'Start Date',
            ],[
                'name'  => 'end_date',
                'data'  => 'end_date',
                'title' => 'End Date',
            ],[
                'name'  => 'type',
                'data'  => 'type',
                'title' => 'Type',
            ],[
                'name'  => 'is_active',
                'data'  => 'is_active',
                'title' => 'Activation',
            ],[
                'name'          => 'show',
                'data'          => 'show',
                'title'         => 'Show',
                'exportable'    => false,
                'printable'     => false,
                'orderable'     => false,
                'searchable'    => false,

            ],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Admin_' . date('YmdHis');
    }
}

