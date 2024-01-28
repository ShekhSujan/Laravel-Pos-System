@extends('layouts.app')
@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('stock.index') }}">Stock</a></li>
            <li class="breadcrumb-item"><a href="#">{{ $allProductStock->title }}</a></li>
        </ol>
    </div>
    <div class="main-container">
        <div class="row  gutters">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                <div class="table-container">
                    <div class="table-responsive">
                        <table id="print-table200" class="table custom-table">
                            <thead>
                                <tr>
                                    <td colspan="4" class="text-center font-weight-bold text-success">Stock IN</td>
                                    <td colspan="3" class="text-center font-weight-bold text-danger">Stock Out</td>
                                </tr>
                                <tr>
                                    <th>SL:</th>
                                    <th>Date</th>
                                    <th>Stock Qty</th>
                                    <th>Supplier</th>
                                    <th>Date</th>
                                    <th>Stock Qty</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($allProductStock->stock as $key => $value)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td> {{ $value->in_date??'--' }}</td>
                                        <td> {{ $value->in_qty??'--' }}</td>
                                        <td> {{ $value->supplier->title}}</td>
                                        <td> {{ $value->out_date??'--' }}</td>
                                        <td> {{ $value->out_qty??'--' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                        <!-- ################# Small modal ####################-->
                        @include('pages.stock.stock-modal')
                        <!-- ################# Small modal ####################-->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
