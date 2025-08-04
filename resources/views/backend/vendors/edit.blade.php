@extends('layouts.app')
@section('title', 'Edit Vendor')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('vendors.index') }}">Manage Vendors</a></li>
                        <li class="breadcrumb-item active">Edit Vendor</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <h4>Edit Vendor</h4>
                    </div>
                    <a href="{{ route('vendors.index') }}" class="btn btn-primary float-sm-right">Go
                        Back</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('vendors.update') }}" method="POST" name="frmEditVendor" id="frmEditVendor"
                        role="form" data-skip="" data-validation="" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="uuid" value="{{ $vendor->uuid }}">
                        <div class="row">
                             <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label" for="name">Vendor Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Enter Vendor Name" value="{{ $vendor->name }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label" for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="Enter Email" min="0" value={{ $vendor->email }}>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label" for="password">Password (Optional)</label>
                                    <input type="password" class="form-control" id="password" name="password"
                                        placeholder="Enter Password">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label" for="status">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="1" {{ $vendor->status ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ $vendor->status == 0 ? 'selected' : '' }}>Inactive
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-success float-sm-right">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
