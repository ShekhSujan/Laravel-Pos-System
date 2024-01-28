@extends('layouts.app')
@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('payment-method.index') }}">All Payment Method</a></li>
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
                                <h5>All Payment Method</h5>
                            </div>
                        </div>
                        <div class="chat-actions">
                            <a href="{{ route('payment-method.create') }}" class="btn btn-info btn-md">Add New</a>
                            <a href="{{ route('payment-method.index') }}" class="btn btn-success btn-md">All Payment
                                Method</a>
                            <a href="{{ route('payment-method.trash_list') }}" class="btn btn-danger btn-md">Trash list</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="print-table100" class="table custom-table">
                            <thead>
                                <tr>
                                    <th>SL:</th>
                                    <th>Title</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($allPaymentMethod as $key => $value)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $value->title }}</td>
                                        <td><span class="badge badge-info"> {{ $value->status }}</span></td>
                                        <td>
                                            <a href="{{ route('payment-method.edit', $value->id) }}"
                                                title="Edit Number"><span class="btn btn-info btn-md"><i
                                                        class="icon-edit1"></i></span></a>
                                            <button type="button" class="btn btn-danger btn-md delete-id"
                                                id="{{ $value->id }}" data-toggle="modal"
                                                data-target=".bd-example-modal-sm" onclick="modalview(this.id)"
                                                title="Trash Number"><i class="icon-x"></i>
                                            </button>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                        <!-- ################# Small modal ####################-->
                        @include('pages.payment-method.trash-modal')
                        <!-- ################# Small modal ####################-->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
