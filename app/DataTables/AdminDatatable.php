<?php

namespace App\DataTables;

use App\Models\PackageInclude;

use App\User;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Html\Editor\Editor;

class AdminDatatable extends DataTable
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
            ->addColumn('edit', 'admin.admins.btn.edit')
            ->addColumn('delete', 'admin.admins.btn.delete')
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
        return User::query()->where('type','admin');
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
                        'text' => '<i class="fa fa-plus"></i> '. 'Create Admin ',
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
                'name'  => 'first_name',
                'data'  => 'first_name',
                'title' => 'First Name',
            ],[
                'name'  => 'last_name',
                'data'  => 'last_name',
                'title' => 'Last Name',
            ],[
                'name'  => 'mobile',
                'data'  => 'mobile',
                'title' => 'Mobile',
            ],[
                'name'  => 'email',
                'data'  => 'email',
                'title' => 'Email',
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

