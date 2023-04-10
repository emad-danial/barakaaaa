<?php

namespace App\DataTables;


use App\models\Flight;

use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Html\Editor\Editor;

class FlightsDatatable extends DataTable
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
            ->addColumn('edit', 'admin.flights.btn.edit')
            ->addColumn('delete', 'admin.flights.btn.delete')
            ->rawColumns([
                'edit',
                'delete',
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
        return Flight::query();
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
                    [
                        'text' => '<i class="fa fa-plus"></i> '. 'Create Flight',
                        'className' => 'btn btn-info',"action"=>"function(){
                                    window.location.href = '". \URL::current() ."/create';
                                 }"
                    ],

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
                            this.api().columns([1,2,3,4]).every(function() {
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
                'name'  => 'flight_name',
                'data'  => 'flight_name',
                'title' => 'Name',
            ],[
                'name'  => 'flight_company',
                'data'  => 'flight_company',
                'title' => 'Company',
            ],[
                'name'  => 'from_city',
                'data'  => 'from_city',
                'title' => 'From City',
            ],[
                'name'  => 'to_city',
                'data'  => 'to_city',
                'title' => 'To City',
            ],[
                'name'  => 'reservation_from',
                'data'  => 'reservation_from',
                'title' => 'Reservation From',
            ],[
                'name'  => 'reservation_to',
                'data'  => 'reservation_to',
                'title' => 'Reservation To',
            ],[
                'name'  => 'price',
                'data'  => 'price',
                'title' => 'Price',
            ],[
                'name'  => 'price_ch',
                'data'  => 'price_ch',
                'title' => 'Price Child',
            ],[
                'name'  => 'is_offer',
                'data'  => 'is_offer',
                'title' => 'Offer',
            ],[
                'name'          => 'edit',
                'data'          => 'edit',
                'title'         => 'Edit',
                'exportable'    => false,
                'printable'     => false,
                'orderable'     => false,
                'searchable'    => false,

            ],[
                'name'          => 'delete',
                'data'          => 'delete',
                'title'         => 'Delete',
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

