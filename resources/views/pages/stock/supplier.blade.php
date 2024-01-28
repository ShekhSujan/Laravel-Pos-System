@extends('backend.layouts.app')
@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('stock.index') }}">Stock List</a></li>
        </ol>
    </div>
    <div class="main-container">
        <div class="row  gutters">
            @include('backend.pages.extra.message')

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                <div class="table-container">
                    <div class="active-user-chatting">
                        <div class="active-user-info">
                            <div class="avatar-info">
                                <h5>Supplier : {{$allStock->title}}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="print-table200" class="table custom-table">
                            <thead>
                                <tr>
                                    <th>SL:</th>
                                    <th>Product</th>

                                    <th>Date</th>
                                    <th>Qty</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($allStock->stock as $key => $value)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td> {{ $value->product->title }}</td>

                                        <td>{{ $value->in_date }}</td>
                                        <td>{{ $value->in_qty }}</td>

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
