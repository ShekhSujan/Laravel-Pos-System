@extends('layouts.app')
@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('order.filter') }}">Order Filter</a></li>
        </ol>
    </div>
    <div class="main-container">
        <div class="row  gutters">
            @include('pages.extra.message')
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('order.filter') }}" method="GET" enctype="multipart/form-data">
                            <div class="row gutters f-flex">
                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label class="" for="start_date">Start Date<span
                                                class="text-danger">*</span></label>
                                        <input type="date" class="form-control" value="{{ request()->start_date }}"
                                            name="start_date">

                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label class="" for="end_date">End Date<span
                                                class="text-danger">*</span></label>
                                        <input type="date" value="{{ request()->end_date }}" class="form-control"
                                            name="end_date">

                                    </div>
                                </div>
                                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12 d-flex align-items-center">
                                    <button type="submit" class="btn btn-primary btn-md btn-block">Filter
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @isset($allOrder)
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                    <div class="table-container">
                        <div class="active-user-chatting">
                            <div class="active-user-info">
                                <div class="avatar-info">
                                    <h5>Order Filter</h5>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="print-table100" class="table custom-table">
                                <thead>
                                    <tr>
                                        <th>SL:</th>
                                        <th>Date</th>
                                        <th>OrderId</th>
                                        <th>subtotal</th>
                                        <th>tax</th>
                                        <th>discount</th>
                                        <th>total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($allOrder as $key => $value)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td> {{ $value->date }} </td>
                                            <td> {{ $value->orderid }} </td>
                                            <td> {{ $value->subtotal }} </td>
                                            <td> {{ $value->tax }} </td>
                                            <td> {{ $value->discount }} </td>
                                            <td> {{ $value->total }} </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="6" class="text-right font-weight-bold">Total Amount : </td>
                                        <td colspan="2" class="text-left font-weight-bold">{{ $totalAmount }}</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            @endisset
        </div>
    </div>
@endsection
