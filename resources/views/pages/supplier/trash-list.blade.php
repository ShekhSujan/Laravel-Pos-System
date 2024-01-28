@extends('layouts.app')
@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('supplier.index') }}">All Supplier</a></li>
            <li class="breadcrumb-item"><a href="{{ route('supplier.trash_list') }}">Trash List</a></li>
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
                                <h5>Trash List</h5>
                            </div>
                        </div>
                        <div class="chat-actions">
                            <a href="{{ route('supplier.create') }}" class="btn btn-info btn-md">Add New</a>
                            <a href="{{ route('supplier.index') }}" class="btn btn-success btn-md">All Supplier</a>
                            <a href="{{ route('supplier.trash_list') }}" class="btn btn-danger btn-md">Trash
                                list</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <form style="overflow: hidden;" action="{{ route('supplier.bulk_action') }}" method="post">
                            @csrf
                            @include('pages.extra.trash-button')
                            <table id="print-table100" class="table custom-table">
                                <thead>
                                    <tr>
                                        <th data-orderable="false" width="10px"><input type="checkbox"
                                                id="chkSelectAll" />SL:</th>
                                        <th>Title</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>City</th>
                                        <th>Zipcode</th>
                                        <th>Address</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($allSupplier as $key => $value)
                                        <tr>
                                            <td><input type="checkbox" name="chk[]" class="chkDel"
                                                    value="{{ $value->id }}" />{{ $loop->iteration }}</td>
                                            <td>{{ $value->title }}</td>
                                            <td>{{ $value->email }}</td>
                                            <td>{{ $value->mobile }}</td>
                                            <td>{{ $value->city }}</td>
                                            <td>{{ $value->zipcode }}</td>
                                            <td>{{ $value->address }}</td>

                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="text-center text-danger" colspan="7">Trash is empty</td>
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
