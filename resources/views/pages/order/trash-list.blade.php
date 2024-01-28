@extends('layouts.app')
@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('order.trash_list') }}">Trash List</a></li>
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
                                <h5>Order Trash</h5>
                            </div>
                        </div>
                        <div class="chat-actions">
                            <a href="{{ route('order.create') }}" class="btn btn-info btn-md">Add New</a>
                            <a href="{{ route('order.pending') }}" class="btn btn-warning btn-md">Pending</a>
                            <a href="{{ route('order.trash_list') }}" class="btn btn-danger btn-md">Trash list</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                            <form style="overflow: hidden;" action="{{ route('order.bulk_action') }}" method="post">
                                @csrf
                                @include('pages.extra.trash-button')
                                <table id="print-table100" class="table custom-table">
                                    <thead>
                                        <tr>
                                            <th data-orderable="false" width="10px"><input type="checkbox"
                                                    id="chkSelectAll" />SL:</th>
                                            <th>OrderId</th>
                                            <th>subtotal</th>
                                            <th>tax</th>
                                            <th>discount</th>
                                            <th>total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($allOrder as $key => $value)
                                            <tr>
                                                <td><input type="checkbox" name="chk[]" class="chkDel"
                                                        value="{{ $value->id }}" />{{ $loop->iteration }}</td>
                                                <td> {{ $value->orderid }} </td>
                                                <td> {{ $value->subtotal }} </td>
                                                <td> {{ $value->tax }} </td>
                                                <td> {{ $value->discount }} </td>
                                                <td> {{ $value->total }} </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td class="text-center text-danger" colspan="6">Trash is empty</td>
                                            </tr>
                                        @endforelse
                                    </tbody>

                                </table>
                                @include('pages.extra.bulk-action')
                            </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
