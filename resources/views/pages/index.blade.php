@extends('layouts.app')
@section('content')
    <!-- Page header start -->
    <div class="page-header">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item active"> Dashboard</li>
        </ol>
    </div>
    <!-- Page header end -->

    <!-- Main container start -->
    <div class="main-container">
        <!-- Row start -->
        <div class="row gutters justify-content-center">
            <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-12">
                <div class="info-stats4">
                    <div class="info-icon">
                        <i class="icon-user1"></i>
                    </div>
                    <div class="sale-num">
                        <h6>{{ $allCategory }}</h6>
                        <p>Categories</p>
                    </div>
                </div>
            </div>

            <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-12">
                <div class="info-stats4">
                    <div class="info-icon">
                        <i class="icon-list"></i>
                    </div>
                    <div class="sale-num">
                        <h6>{{ $allBrand }}</h6>
                        <p>Brands</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-12">
                <div class="info-stats4">
                    <div class="info-icon">
                        <i class="icon-list"></i>
                    </div>
                    <div class="sale-num">
                        <h6>{{ $allProduct }}</h6>
                        <p>Products</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-12">
                <div class="info-stats4">
                    <div class="info-icon">
                        <i class="icon-list"></i>
                    </div>
                    <div class="sale-num">
                        <h6>{{ $allOrder }}</h6>
                        <p>Orders</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-12">
                <div class="info-stats4">
                    <div class="info-icon">
                        <i class="icon-list"></i>
                    </div>
                    <div class="sale-num">
                        <h6>{{ $allPaymentMethod }}</h6>
                        <p>P.Methods</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-12">
                <div class="info-stats4">
                    <div class="info-icon">
                        <i class="icon-list"></i>
                    </div>
                    <div class="sale-num">
                        <h6>{{ $allSupplier }}</h6>
                        <p>Suppliers</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row  gutters">
            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 ">
                <div class="table-container">
                    <div class="active-user-chatting">
                        <div class="active-user-info">
                            <div class="avatar-info">
                                <h5>Latest Order</h5>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table custom-table">
                            <thead>
                                <tr>
                                    <th>SL:</th>
                                    <th>OrderId</th>
                                    <th>subtotal</th>
                                    <th>tax</th>
                                    <th>discount</th>
                                    <th>total</th>
                                    <th>Status</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($allPosOrder as $key => $value)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td> {{ $value->orderid }} </td>
                                        <td> {{ $value->subtotal }} </td>
                                        <td> {{ $value->tax }} </td>
                                        <td> {{ $value->discount }} </td>
                                        <td> {{ $value->total }} </td>
                                        <td> {{ $value->status }} </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>

                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 ">
                <div class="table-container">
                    <div class="active-user-chatting">
                        <div class="active-user-info">
                            <div class="avatar-info">
                                <h5>Stock Out</h5>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table custom-table">
                            <thead>
                                <tr>
                                    <th>SL:</th>
                                    <th>Product</th>
                                    <th>Suggestion</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($allProductStock as $key => $value)
                                    <tr>
                                        @if ($value->stock_availability==false)
                                        <td>{{ $loop->iteration }}</td>
                                        <td> {{ $value->title }}</td>
                                        <td><p class="text-danger">Stock Out</p></td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
