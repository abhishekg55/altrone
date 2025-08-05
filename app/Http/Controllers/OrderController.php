<?php

namespace App\Http\Controllers;

use App\DataTables\OrderDataTable;
use App\Mail\OrderMail;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(OrderDataTable $dataTable)
    {
        abort_if(Gate::denies('access_orders'), Response::HTTP_FORBIDDEN, 'You are not authorized to access this page !');

        $vendors = User::where('status', true)->role('vendor')->get();
        return $dataTable->render('backend.orders.index', compact('vendors'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($uuid)
    {
        abort_if(Gate::denies('view_order'), Response::HTTP_FORBIDDEN, 'You are not authorized to access this page !');

        try {
            $order = Order::with('items', 'user', 'items.product', 'items.vendor')->where('uuid', $uuid)->firstOrFail();
            return view('backend.orders.view', compact('order'));
        } catch (Exception $ex) {
            if ($ex instanceof \Illuminate\Database\Eloquent\ModelNotFoundException) {
                return response()->json(['res_code' => 1, 'message' => 'Whoops, Order not found!', 'method' => "RegErrorMsg"]);
            }
            return response()->json(['res_code' => 1, 'message' => 'Whoops, something went wrong!', 'method' => "RegErrorMsg"]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }

    public function goTocheckout()
    {
        return view('frontend.checkout');
    }

    function checkout(Request $request)
    {
        $validation = Validator::make(
            $request->all(),
            [
                'address' => 'required',
            ],
            [
                'address.required' => 'Address field is required.',
            ]
        );

        if ($validation->fails()) {
            return response()->json(['res_code' => 1, 'message' => $validation->errors()->first(), 'method' => "error_message", 'title' => 'Error', 'type' => 'error']);
        }

        try {

            DB::beginTransaction();

            $order = Order::create([
                'user_id' => auth('customer')->id(),
                'address' => $request->address,
                'total_amount' => \Cart::getTotal(),
                'status' => 0,
                'payment_status' => 1,
            ]);

            $products = Product::with('vendor')->where('status', true)->get();

            $items = [];

            foreach (\Cart::getContent() as $key => $item) {

                $product = $products->where('uuid', $item->id)->first();

                if ($product) {
                    $items[] = [
                        'order_id' => $order->id,
                        'product_id' => $product->id,
                        'vendor_id' => $product->vendor->id,
                        'quantity' => $item->quantity,
                        'price' => $product->price,
                        'total_amount' => $item->getPriceSum(),
                        'created_at' => now()
                    ];
                }
            }

            OrderItem::insert($items);

            $orderDeatail = Order::with('items', 'user', 'items.product', 'items.product.vendor')->where('id', $order->id)->first();

            Mail::to($order->user->email)
                ->send(new OrderMail($orderDeatail));

            \Cart::clear();
            \Cart::clearItems();

            DB::commit();

            return response()->json(['res_code' => 1, 'method' => 'redirect_with_msg', 'title' => 'Success', 'type' => 'success', 'link' => route('front.home'), 'message' => 'Order Placed Successfully !']);
        } catch (Exception $ex) {

            DB::rollBack();
            return response()->json(['res_code' => 1, 'message' => 'Whoops, Something Went wrong!', 'method' => "error_message", 'title' => 'Error', 'type' => 'error']);
        }
    }
}
