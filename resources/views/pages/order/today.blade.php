@extends('layouts.app')
@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('order.today') }}">Todays Order</a></li>
        </ol>
    </div>
    <div class="main-container">
        <div class="row  gutters">
            @include('pages.extra.message')
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                <div class="table-container">
                    <div class="active-user-chatting">
                        <div class="active-user-info">
                            <div class="avatar-info">
                                <h5>Todays Order</h5>
                            </div>
                        </div>
                        <div class="chat-actions">
                            <a href="{{ route('order.create') }}" class="btn btn-info btn-md">Add New</a>
                            <a href="{{ route('order.trash_list') }}" class="btn btn-danger btn-md">Trash list</a>
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
                                @foreach ($allToday as $key => $value)
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
        </div>
    </div>
@endsection
