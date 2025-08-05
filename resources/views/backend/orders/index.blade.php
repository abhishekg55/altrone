@extends('layouts.app')
@section('title', 'Manage Orders')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Manage Orders</li>
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
                        <h4>Manage Orders</h4>
                    </div>
                </div>
                <div class="card-body">

                    @if(auth()->user()->is_admin)
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="vendor">Filter by Vendor</label>
                                <select name="vendor" id="vendor" class="custom-select form-control">
                                    <option value="">All</option>
                                    @foreach ($vendors as $vendor)
                                        <option value="{{ $vendor->id }}">{{ $vendor->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    @endif
                    <div class="row">
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

    <script>
        $(document).ready(function() {

            $('#vendor').change(function() {
                callDatatable();
            });

            $('#status').change(function() {
                callDatatable();
            });

        });

        function callDatatable() {

            var vendor = $('#vendor').val();

            window.LaravelDataTables["orderTable"].on('preXhr.dt', function(e, settings, data) {
                data.vendor = vendor != '' ? vendor : '';
            });

            window.LaravelDataTables["orderTable"].draw();
        }
    </script>
@endpush
