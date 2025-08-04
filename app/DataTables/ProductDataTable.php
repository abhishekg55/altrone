<?php

namespace App\DataTables;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Http\JsonResponse;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Support\Str;

class ProductDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder<Product> $query Results from query() method.
     */
    public function ajax(): JsonResponse
    {
        return datatables()
            ->eloquent($this->query())
            ->addColumn('action', function ($query) {
                return '<a href="' . route('products.edit', $query->uuid) . '"  class="btn btn-outline-primary">
                            <i class="fa fa-edit"></i>
                        </a>
                        ';
            })
            ->editColumn('image', function ($query) {
                return '<img src="' . asset('storage/' . $query->image) . '" class="img img-circle" width="50" height="50">';
            })
            ->editColumn('created_at', function ($query) {
                return date('d-m-Y h:i A', strtotime($query->created_at));
            })

            ->editColumn('status', function ($query) {
                return $query->status ? 'Active' : 'Inactive';
            })
            ->filterColumn('status', function ($query, $keyword) {
                $keyword = strtolower(trim($keyword));
                if ($keyword == Str::lower('active')) {
                    $query->where('status', 1);
                } elseif ($keyword == Str::lower('inactive')) {
                    $query->where('status', 0);
                }
            })
            ->setRowId('id')
            ->rawColumns(['action', 'image'])
            ->make(true);
    }

    /**
     * Get the query source of dataTable.
     *
     * @return QueryBuilder<Product>
     */
    public function query(): QueryBuilder
    {
        $query = Product::query();
        // if (request()->has('category') && request()->category != '') {
        //     $query->whereHas('categories', function ($q) {
        //         $q->where('category_id', request()->category);
        //     });
        // }
        // if (request()->has('rank') && request()->rank != '') {
        //     $query->where('rank_id', request()->rank);
        // }

        $query->orderBy('created_at', 'desc');

        return $this->applyScopes($query);
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('productTable')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->responsive()
            ->orderBy(1)
            ->dom("<'row mb-3'<'col-md-3'f><'col-md-3'B><'col-md-6 text-right'l>>" .  // l = length, B = buttons, f = filter
                "<'row'<'col-md-12'tr>>" .
                "<'row mt-2'<'col-md-5'i><'col-md-7 text-right'p>>")
            ->buttons([
                Button::make('excel'),
                Button::make('csv'),
            ])
            ->parameters([
                'lengthMenu' => [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
                "language" => [
                    "searchPlaceholder" => "Search here",
                ],
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
            Column::make('image')->orderable(false),
            Column::make('name'),
            Column::make('price')->addClass('dt-body-left dt-head-left'),
            Column::make('stock')->addClass('dt-body-left dt-head-left'),
            Column::make('status'),
            Column::make('created_at'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Product_' . date('YmdHis');
    }
}
