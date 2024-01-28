@extends('layouts.app')
@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('stock.index') }}">Stock</a></li>
            <li class="breadcrumb-item"><a href="#">Filter</a></li>
        </ol>
    </div>
    <div class="main-container">
        <div class="row  gutters">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('stock.filter') }}" method="GET" enctype="multipart/form-data">
                            <div class="row gutters">
                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label class="" for=" category_id">Product <span
                                                class="text-danger">*</span></label>
                                        <select class="form-control selectpicker" data-live-search="true" name="product_id">
                                            <option value="">All Product</option>
                                            @foreach ($allProduct as $product)
                                                <option value="{{ $product->id }}" @selected($product->id == request()->product_id)>
                                                    {{ $product->title }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label class="" for="supplier_id">Supplier <span
                                                class="text-danger">*</span></label>
                                        <select class="form-control selectpicker" data-live-search="true"
                                            name="supplier_id">
                                            <option value="">All Supplier</option>
                                            @foreach ($allSupplier as $supplier)
                                                <option value="{{ $supplier->id }}" @selected($supplier->id == request()->supplier_id)>
                                                    {{ $supplier->title }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label class="" for="start_date">Start Date <span
                                                class="text-danger">*</span></label>
                                        <input type="date" name="start_date" class="form-control"
                                            value="{{ request()->start_date }}" required/>
                                    </div>
                                </div>
                                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label class="" for="end_date">End Date <span
                                                class="text-danger">*</span></label>
                                        <input type="date" name="end_date" class="form-control"
                                            value="{{ request()->end_date }}"required />
                                    </div>
                                </div>
                                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12 d-flex align-items-center">
                                    <button type="submit" name="submit" class="btn btn-primary btn-md btn-block">Filter
                                    </button>
                                </div>
                            </div>
                    </div>
                </div>
            </div>

            @isset($allStock)
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                    <div class="table-container">
                        <div class="table-responsive">
                            <table id="print-table100" class="table custom-table">
                                <thead>
                                    <tr>
                                        <td colspan="2" class="text-center font-weight-bold text-success">Product</td>
                                        <td class="text-center font-weight-bold text-success">Supplier</td>
                                        <td colspan="2" class="text-center font-weight-bold text-success">Stock IN</td>
                                        <td colspan="3" class="text-center font-weight-bold text-danger">Stock Out</td>
                                    </tr>
                                    <tr>
                                        <th>SL:</th>
                                        <th>Product</th>
                                        <th>Supplier</th>
                                        <th>Date</th>
                                        <th>Stock Qty</th>
                                        <th>Date</th>
                                        <th>Stock Qty</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($allStock as $key => $value)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $value->product->title }}</td>
                                            <td>{{ $value->supplier->title }}</td>
                                            <td> {{ $value->in_date ?? '--' }}</td>
                                            <td> {{ $value->in_qty ?? '--' }}</td>
                                            <td> {{ $value->out_date ?? '--' }}</td>
                                            <td> {{ $value->out_qty ?? '--' }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            @endisset
        </div>
    </div>
@endsection
