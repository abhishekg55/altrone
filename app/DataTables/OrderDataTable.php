<?php

namespace App\DataTables;

use App\Helpers\Helper;
use App\Models\Order;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Http\JsonResponse;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Support\Str;

class OrderDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder<Order> $query Results from query() method.
     */
    public function ajax(): JsonResponse
    {
        return datatables()
            ->eloquent($this->query())
            ->addColumn('action', function ($query) {
                return '<a href="' . route('orders.view', $query->uuid) . '"  class="btn btn-outline-primary">
                            <i class="fa fa-eye"></i>
                        </a>
                        ';
            })
            ->editColumn('created_at', function ($query) {
                return date('d-m-Y h:i A', strtotime($query->created_at));
            })
            ->editColumn('order_id', function ($query) {
                return '#' . $query->id;
            })
            ->editColumn('status', function ($query) {
                return Helper::getOrderStatus($query->status);
            })
            ->editColumn('payment_status', function ($query) {
                return Helper::getOrderPaymentStatus($query->payment_status);
            })
            ->editColumn('total_amount', function ($query) {
                return '₹' . number_format($query->total_amount, 2);
            })
            ->setRowId('id')
            ->rawColumns(['action', 'image'])
            ->make(true);
    }

    /**
     * Get the query source of dataTable.
     *
     * @return QueryBuilder<Order>
     */
    public function query(): QueryBuilder
    {
        $query = Order::with('items', 'user', 'items.product');

        if (request()->has('vendor') && request()->vendor != '') {
            $query->whereHas('items.product', function ($q) {
                $q->where('vendor_id', request()->vendor);
            });
        }

        if(auth()->user()->hasRole('vendor')){
             $query->whereHas('items', function($q) {
                $q->where('vendor_id', auth()->id());
            });
        }

        $query->orderBy('created_at', 'desc');

        return $this->applyScopes($query);
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('orderTable')
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
            Column::make('order_id')->name('id')->title('Order ID'),
            Column::make('user.name')->title('Customer Name'),
            Column::make('user.email')->title('Customer Email'),
            Column::make('address'),
            Column::make('status')->searchable(false),
            Column::make('payment_status')->searchable(false),
            Column::make('created_at'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Order_' . date('YmdHis');
    }
}
