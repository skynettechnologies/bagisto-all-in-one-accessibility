<?php

namespace SkynetTechnologies\AllinOneAccessibility\DataGrids;

use Illuminate\Support\Facades\DB;
use Webkul\DataGrid\DataGrid;

class AioADataGrid extends DataGrid
{
    /**
     * Primary column.
     *
     * @var string
     */
    /**
     * Prepare query builder.
     *
     * @return \Illuminate\Database\Query\Builder
     */
    public function prepareQueryBuilder()
    {
        $queryBuilder = DB::table('aioa')
            ->select('id', 'license_key', 'color_code', 'created_at', 'updated_at');

        return $queryBuilder;
    }

    /**
     * Prepare columns.
     *
     * @return void
     */
    public function prepareColumns()
    {
        $this->addColumn([
            'index'      => 'id',
            'label'      => trans('allinoneaccessibility::app.admin.datagrid.id'),
            'type'       => 'number',
            'searchable' => false,
            'sortable'   => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index'      => 'license_key',
            'label'      => trans('allinoneaccessibility::app.admin.datagrid.license_key'),
            'type'       => 'string',
            'searchable' => true,
            'sortable'   => true,
            'filterable' => false,
            'closure'    => function ($value) {
                return substr($value->license_key, 0, 20);
            },
        ]);

        $this->addColumn([
            'index'      => 'color_code',
            'label'      => trans('allinoneaccessibility::app.admin.datagrid.color_code'),
            'type'       => 'boolean',
            'sortable'   => true,
            'searchable' => false,
            'filterable' => true,
            'closure'    => function ($value) {
                if ($value->color_code) {
                    return '<p class="label-active">' . trans('allinoneaccessibility::app.admin.datagrid.active') . '</p>';
                }

                return '<p class="label-info">' . trans('allinoneaccessibility::app.admin.datagrid.inactive') . '</p>';
            },
        ]);

        $this->addColumn([
            'index'      => 'created_at',
            'label'      => trans('allinoneaccessibility::app.admin.datagrid.created_at'),
            'type'       => 'datetime',
            'searchable' => true,
            'sortable'   => true,
            'filterable' => true,
        ]);

        $this->addColumn([
            'index'      => 'updated_at',
            'label'      => trans('allinoneaccessibility::app.admin.datagrid.updated_at'),
            'type'       => 'datetime',
            'searchable' => true,
            'sortable'   => true,
            'filterable' => true,
        ]);
    }

    /**
     * Prepare actions.
     *
     * @return void
     */
    public function prepareActions()
    {
        $this->addAction([
            'icon'   => 'icon-edit',
            'license_key'  => trans('allinoneaccessibility::app.admin.datagrid.edit'),
            'method' => 'GET',
            'url'    => function ($row) {
                return route('admin.allinoneaccessibility.edit', $row->id);
            },
        ]);

        $this->addAction([
            'icon'   => 'icon-delete',
            'license_key'  => trans('allinoneaccessibility::app.admin.datagrid.delete'),
            'method' => 'DELETE',
            'url'    => function ($row) {
                return route('admin.allinoneaccessibility.delete', $row->id);
            },
        ]);
    }

    /**
     * Prepare mass actions.
     *
     * @return void
     */
    public function prepareMassActions()
    {
        $this->addMassAction([
            'license_key'   => trans('allinoneaccessibility::app.admin.datagrid.mass-update'),
            'url'     => route('admin.allinoneaccessibility.mass_update'),
            'method'  => 'POST',
            'options' => [
                [
                    'label'  => trans('allinoneaccessibility::app.admin.datagrid.active'),
                    'value' => 1,
                ],
                [
                    'label'  => trans('allinoneaccessibility::app.admin.datagrid.inactive'),
                    'value' => 0,
                ],
            ],
        ]);

        $this->addMassAction([
            'license_key'  => trans('allinoneaccessibility::app.admin.datagrid.mass-delete'),
            'url'    => route('admin.allinoneaccessibility.mass_delete'),
            'method' => 'POST'
        ]);
    }
}
