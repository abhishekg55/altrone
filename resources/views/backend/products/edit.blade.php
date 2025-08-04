@extends('layouts.app')
@section('title', 'Edit Product')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Manage Products</a></li>
                        <li class="breadcrumb-item active">Edit Product</li>
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
                        <h4>Edit Product</h4>
                    </div>
                    <a href="{{ route('products.index') }}" class="btn btn-primary float-sm-right">Go
                        Back</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('products.update') }}" method="POST" name="frmEditProduct" id="frmEditProduct"
                        role="form" data-skip="" data-validation="" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="uuid" value="{{ $product->uuid }}">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label" for="name">Product Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ $product->name }}" placeholder="Enter Product Name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label" for="image">Product Image</label>
                                    <input type="file" class="form-control" id="image" name="image">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="col-form-label" for="price">Price</label>
                                    <input type="number" class="form-control" id="price" name="price"
                                        placeholder="Enter Price" min="0" value="{{ $product->price }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="col-form-label" for="stock">Stock</label>
                                    <input type="number" class="form-control" id="stock" name="stock"
                                        placeholder="Enter Stock" min="0" value="{{ $product->stock }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="col-form-label" for="status">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="1" {{ $product->status ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ $product->status == 0 ? 'selected' : '' }}>Inactive
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-8">
                                <div class="form-group">
                                    <label class="col-form-label" for="description">Description</label>
                                    <textarea name="description" id="description" class="form-control" name="description" cols="10" rows="6"
                                        placeholder="Enter Description">{{ $product->description }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="col-form-label">Existing Image</label><br>
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                    class="img img-thumbnail img-responsive" width="250">
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
