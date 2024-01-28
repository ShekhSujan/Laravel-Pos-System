@extends('layouts.app')
@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('supplier.index') }}">All Supplier</a></li>
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
                                <h5>All Supplier</h5>
                            </div>
                        </div>
                        <div class="chat-actions">
                            <a href="{{ route('supplier.create') }}" class="btn btn-info btn-md">Add New</a>
                            <a href="{{ route('supplier.index') }}" class="btn btn-success btn-md">All Supplier</a>
                            <a href="{{ route('supplier.trash_list') }}" class="btn btn-danger btn-md">Trash list</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="print-table100" class="table custom-table">
                            <thead>
                                <tr>
                                    <th>SL:</th>
                                    <th>Title</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>City</th>
                                    <th>Zipcode</th>
                                    <th>Address</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($allSupplier as $key => $value)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $value->title }}</td>
                                        <td>{{ $value->email }}</td>
                                        <td>{{ $value->mobile }}</td>
                                        <td>{{ $value->city }}</td>
                                        <td>{{ $value->zipcode }}</td>
                                        <td>{{ $value->address }}</td>

                                        <td><span class="badge badge-info"> {{ $value->status }}</span></td>
                                        <td>
                                            <a href="{{ route('supplier.edit', $value->id) }}" title="Edit Number"><span
                                                    class="btn btn-info btn-md"><i class="icon-edit1"></i></span></a>
                                            <button type="button" class="btn btn-danger btn-md delete-id"
                                                id="{{ $value->id }}" data-toggle="modal"
                                                data-target=".bd-example-modal-sm" onclick="modalview(this.id)"
                                                title="Trash Number"><i class="icon-x"></i>
                                            </button>
                                            {{-- <a href="{{ route('stock.supplier', $value->id) }}" title="View Stock"><span
                                                    class="btn btn-info btn-md"><i class="icon-eye"></i></span></a> --}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                        <!-- ################# Small modal ####################-->
                        @include('pages.supplier.trash-modal')
                        <!-- ################# Small modal ####################-->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
