<?php

namespace App\DataTables;

use App\Models\Advertisement;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class AdvertisementDataTable extends DataTable
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
            ->addColumn('action', 'dashboard.advertisement.action');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Advertisement $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Advertisement $model)


    {
        $query = $model->with(['User', 'Category'])->newQuery();
        if (request()->filled('tags')) {
            $tags = request('tags');
            $query = $query->whereHas('tags', function (Builder $q) use ($tags) {
                $q->whereIn('id', $tags);
            });
        }
        if (request()->filled('users')) {
            $users = request('users');
            $query = $query->whereHas('User', function (Builder $q) use ($users) {
                $q->whereIn('id', $users);
            });
        }
        if (request()->filled('categories')) {
            $categories = request('categories');
            $query = $query->whereHas('category', function (Builder $q) use ($categories) {
                $q->whereIn('id', $categories);
            });
        }
        if (request()->filled('approval')) {
            if (request('approval') === 'approved') {
                $query = $query->where('approved', true)->where('disapproved', false);
            };
            if (request('approval') === 'disapproved') {
                $query = $query->where('disapproved', true)->where('approved', false);
            };
            if (request('approval') === 'pending') {
                $query = $query->where('approved', false)->where('disapproved', false);
            };
        };


        return $query;
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('advertisement-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(1)
            ->buttons(
                Button::make('create'),
                Button::make('export'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('id'),
            Column::make('name'),
            Column::make('discription'),
            Column::make('approved_at'),
            Column::make('disapproved_at'),
            [
                "data" => "category.name",
                "title" => "category",
                "name"=> "Category.name"
            ],
            [
                "data" => "user.name",
                "title" => "user",
                "name"=> "User.name"
            ],
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Advertisement_' . date('YmdHis');
    }
}
