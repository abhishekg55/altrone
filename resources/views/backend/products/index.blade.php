@extends('layouts.app')
@section('title', 'Manage Products')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Manage Products</li>
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
                        <h4>Manage Products</h4>
                    </div>
                    <a href="{{ route('products.create') }}" class="btn btn-primary float-sm-right">Add New Product</a>
                </div>
                <div class="card-body">
                    <div class="row mt-5">
                        <div class="col-md-12">
                            {!! $dataTable->table(['class' => 'table table-bordered table-striped']) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    {!! $dataTable->scripts() !!}
@endpush
