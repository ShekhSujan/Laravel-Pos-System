@extends('layouts.app')
@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('order.pos_sales') }}">PosOrder Order</a></li>
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
                                <h5>PosOrder Order</h5>
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
                                    <th>OrderId</th>
                                    <th>subtotal</th>
                                    <th>tax</th>
                                    <th>discount</th>
                                    <th>total</th>
                                    <th>Status</th>
                                    <th>Action</th>
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
                                        <td>
                                            <form action="{{ route('order.order_update') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $value->id }}" />
                                                <select name="status">
                                                    <option value="{{ 'draft' }}" @selected($value->status == 'draft')>Draft
                                                    </option>
                                                    <option value="{{ 'active' }}" @selected($value->status == 'active')>Active
                                                    </option>
                                                </select>
                                                <button type="submit" class="btn btn-success btn-sm"><i
                                                        class="icon-check2"></i></i></button>
                                            </form>
                                        </td>
                                        <td>
                                            <a href="{{ route('invoice', $value->id) }}" title="Edit Row"
                                                target="_blank"><span class="btn btn-info btn-md"><i
                                                        class="icon-eye"></i></span>
                                            </a>
                                            <a href="{{ route('pos_invoice', $value->id) }}" title="View Row"
                                                target="_blank" style="width: unset;  height: unset;">
                                                <span class="btn btn-success btn-md"><i class="icon-print"></i></span>
                                            </a>
                                            <button type="button" class="btn btn-danger btn-md delete-id"
                                                id="{{ $value->id }}" data-toggle="modal"
                                                data-target=".bd-example-modal-sm" onclick="modalview(this.id)"
                                                title="Trash Row"><i class="icon-x"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                        <!-- ################# Small modal ####################-->
                        @include('pages.order.trash-modal')
                        <!-- ################# Small modal ####################-->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
