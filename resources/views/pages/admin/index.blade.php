@extends('layouts.app')
@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Admins</a></li>
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
                                <h5>Admins</h5>
                            </div>
                        </div>
                        <div class="chat-actions">
                            <a href="{{ route('admin.create') }}" class="btn btn-info btn-md">Add New</a>
                            <a href="{{ route('admin.index') }}" class="btn btn-success btn-md">All Admins</a>
                            <a href="{{ route('admin.trash_list') }}" class="btn btn-danger btn-md">Trash list</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="print-table100" class="table custom-table">
                            <thead>
                                <tr>
                                    <th>SL:</th>
                                    <th>Image</th>
                                    <th>Name/UserName</th>
                                    <th>Email/Mobile</th>
                                    <th>Role/Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($allAdmin as $key => $value)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        @if (!$value->image)
                                            <td><img src="{{ asset('assets/backend/images/pro.png') }}" alt="No Image"  width="50" /></td>
                                        @else
                                            <td><img src="{{$value->image_url}}" alt="No Image" width="50" /></td>
                                        @endif
                                        <td>
                                            {{ $value->name }}<br>
                                            {{ $value->username }}
                                        </td>
                                        <td>{{ $value->email }}<br>{{ $value->mobile }}</td>
                                        <td>
                                            <span class="badge badge-success">{{ $value->role }}</span>
                                            <br>
                                            <span class="badge badge-info">{{ $value->status }}</span>

                                        </td>
                                        <td>
                                            <a href="{{ route('admin.change_password', $value->id) }}"
                                                title="Change Password"><span class="btn btn-primary btn-md"><i
                                                        class="icon-edit-3"></i></span></a>
                                            <a href="{{ route('admin.edit', $value->id) }}" title="Edit Row"><span
                                                    class="btn btn-info btn-md"><i class="icon-edit1"></i></span></a>

                                            <button type="button" class="btn btn-danger btn-md delete-id"
                                                id="{{ $value->id }}" data-toggle="modal"
                                                data-target=".bd-example-modal-sm" onclick="modalview(this.id)"
                                                title="Trash Row"><i class="icon-x"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                        <!-- ################# Small modal ####################-->
                        @include('pages.admin.trash-modal')
                        <!-- ################# Small modal ####################-->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
