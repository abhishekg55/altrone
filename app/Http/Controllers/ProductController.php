<?php

namespace App\Http\Controllers;

use App\DataTables\ProductDataTable;
use App\Helpers\Helper;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ProductDataTable $dataTable)
    {
        abort_if(Gate::denies('access_products'), Response::HTTP_FORBIDDEN, 'You are not authorized to access this page !');
        return $dataTable->render('backend.products.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        abort_if(Gate::denies('create_product'), Response::HTTP_FORBIDDEN, 'You are not authorized to access this page !');
        return view('backend.products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductStoreRequest $request)
    {
        abort_if(Gate::denies('create_product'), Response::HTTP_FORBIDDEN, 'You are not authorized to access this page !');

        $validation = Helper::getValidationMessage($request);

        if ($validation) {
            return response()->json(['res_code' => 1, 'message' => $validation, 'method' => "error_message", 'title' => 'Error', 'type' => 'error']);
        }

        $image_path = '';
        if ($request->hasFile('image')) {
            $image_path = $request->image->store('products', 'public');
        }

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'description' => $request->description,
            'image' => $image_path,
            'vendor_id' => auth()->id()
        ]);

        return response()->json(['res_code' => 1, 'method' => 'redirect_with_msg', 'title' => 'Success', 'type' => 'success', 'link' => route('products.index'), 'message' => 'Product created Successfully !']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($uuid)
    {
        abort_if(Gate::denies('edit_product'), Response::HTTP_FORBIDDEN, 'You are not authorized to access this page !');

        try {
            $product = Product::where('uuid', $uuid)->firstOrFail();
            return view('backend.products.edit', compact('product'));
        } catch (Exception $ex) {
            if ($ex instanceof \Illuminate\Database\Eloquent\ModelNotFoundException) {
                return response()->json(['res_code' => 1, 'message' => 'Whoops, Product not found!', 'method' => "RegErrorMsg"]);
            }
            return response()->json(['res_code' => 1, 'message' => 'Whoops, something went wrong!', 'method' => "RegErrorMsg"]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductUpdateRequest $request)
    {
        abort_if(Gate::denies('edit_product'), Response::HTTP_FORBIDDEN, 'You are not authorized to access this page !');

        try {

            $product = Product::where('uuid', $request->uuid)->firstOrFail();

            $image_path = $product->image;

            if ($request->hasFile('image')) {
                if (Storage::exists($image_path)) {
                    Storage::delete($image_path);
                }
                $image_path = $request->image->store('products', 'public');
            }

            $product->update([
                'name' => $request->name,
                'price' => $request->price,
                'stock' => $request->stock,
                'description' => $request->description,
                'image' => $image_path,
                'status' => $request->status
            ]);

            return response()->json(['res_code' => 1, 'method' => 'redirect_with_msg', 'title' => 'Success', 'type' => 'success', 'link' => route('products.index'), 'message' => 'Product updated Successfully !']);
        } catch (Exception $ex) {
            if ($ex instanceof \Illuminate\Database\Eloquent\ModelNotFoundException) {
                return response()->json(['res_code' => 1, 'message' => 'Whoops, Product not found!', 'method' => "RegErrorMsg"]);
            }
            return response()->json(['res_code' => 1, 'message' => 'Whoops, something went wrong!', 'method' => "RegErrorMsg"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
