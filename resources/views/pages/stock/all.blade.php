@extends('layouts.app')
@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('stock.index') }}">Stock List</a></li>
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
                                <h5>All Stock</h5>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <form style="overflow: hidden;" action="{{ route('stock.bulk_action') }}" method="post">
                            @csrf
                            <div class="dropdown show">
                                <button class="btn btn-primary btn-sm dropdown-toggle" type="button" width="20px"
                                    role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    Bulk Action
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <button type="button" class="dropdown-item" data-toggle="modal" onclick="modalBulk(0)"
                                        data-target=".bd-example-modal-sm-action" href="#">Pernament Delete</button>
                                </div>
                            </div>
                            <table id="print-table200" class="table custom-table">
                                <thead>
                                    <tr>
                                        <th data-orderable="false" width="10px"><input type="checkbox"
                                                id="chkSelectAll" />SL:</th>
                                        <th>Product</th>
                                        <th>Supplier</th>
                                        <th>Date</th>
                                        <th>Qty</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($allStock as $key => $value)
                                        <tr>
                                            <td><input type="checkbox" name="chk[]" class="chkDel"
                                                    value="{{ $value->id }}" />{{ $loop->iteration }}</td>
                                            <td> {{ $value->product->title }}</td>
                                            <td> {{ $value->supplier->title }}</td>
                                            <td>{{ $value->in_date }}</td>
                                            <td>{{ $value->in_qty }}</td>

                                            <td class="d-flex">
                                                <a href="{{ route('stock.edit', $value->id) }}" title="Edit Row"><span
                                                        class="btn btn-info btn-md"><i class="icon-edit1"></i></span>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                            @include('pages.extra.bulk-action')
                        </form>
                        <!-- ################# Small modal ####################-->
                        @include('pages.stock.stock-modal')
                        <!-- ################# Small modal ####################-->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
