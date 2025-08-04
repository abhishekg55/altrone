<?php

namespace App\Http\Controllers;

use App\DataTables\VendorDataTable;
use App\Helpers\Helper;
use App\Http\Requests\VendorStoreRequest;
use App\Http\Requests\VendorUpdateRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(VendorDataTable $dataTable)
    {
        abort_if(Gate::denies('access_vendors'), Response::HTTP_FORBIDDEN, 'You are not authorized to access this page !');
        return $dataTable->render('backend.vendors.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.vendors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VendorStoreRequest $request)
    {
        abort_if(Gate::denies('create_vendor'), Response::HTTP_FORBIDDEN, 'You are not authorized to access this page !');

        $validation = Helper::getValidationMessage($request);

        if ($validation) {
            return response()->json(['res_code' => 1, 'message' => $validation, 'method' => "error_message", 'title' => 'Error', 'type' => 'error']);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => 0,
        ]);

        $user->assignRole('vendor');

        return response()->json(['res_code' => 1, 'method' => 'redirect_with_msg', 'title' => 'Success', 'type' => 'success', 'link' => route('vendors.index'), 'message' => 'Vendor created Successfully !']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $uuid)
    {
        abort_if(Gate::denies('edit_vendor'), Response::HTTP_FORBIDDEN, 'You are not authorized to access this page !');

        try {
            $vendor = User::where('uuid', $uuid)->firstOrFail();
            return view('backend.vendors.edit', compact('vendor'));
        } catch (Exception $ex) {
            if ($ex instanceof \Illuminate\Database\Eloquent\ModelNotFoundException) {
                return response()->json(['res_code' => 1, 'message' => 'Whoops, Vendor not found!', 'method' => "RegErrorMsg"]);
            }
            return response()->json(['res_code' => 1, 'message' => 'Whoops, something went wrong!', 'method' => "RegErrorMsg"]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VendorUpdateRequest $request)
    {
        abort_if(Gate::denies('edit_vendor'), Response::HTTP_FORBIDDEN, 'You are not authorized to access this page !');

        $validation = Helper::getValidationMessage($request);

        if ($validation) {
            return response()->json(['res_code' => 1, 'message' => $validation, 'method' => "error_message", 'title' => 'Error', 'type' => 'error']);
        }

        try {

            $user = User::where('uuid', $request->uuid)->firstOrFail();

            if ($request->filled('password')) {
                $user->update([
                    'password' => Hash::make($request->password),
                ]);
            }

            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'is_admin' => 0,
                'status' => $request->status
            ]);

            return response()->json(['res_code' => 1, 'method' => 'redirect_with_msg', 'title' => 'Success', 'type' => 'success', 'link' => route('vendors.index'), 'message' => 'Vendor Updated Successfully !']);
        } catch (Exception $ex) {
            if ($ex instanceof \Illuminate\Database\Eloquent\ModelNotFoundException) {
                return response()->json(['res_code' => 1, 'message' => 'Whoops, Vendor not found!', 'method' => "RegErrorMsg"]);
            }
            return response()->json(['res_code' => 1, 'message' => 'Whoops, something went wrong!', 'method' => "RegErrorMsg"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
