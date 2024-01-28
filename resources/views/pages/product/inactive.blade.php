@extends('layouts.app')
@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('product.inactive') }}">Inactive Product</a></li>
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
                                <h5>Inactive Product</h5>
                            </div>
                        </div>
                        <div class="chat-actions">
                            <a href="{{ route('product.create') }}" class="btn btn-info btn-md">Add
                                New</a>
                            <a href="{{ route('product.inactive') }}" class="btn btn-success btn-md">Inactive  Product</a>
                            <a href="{{ route('product.trash_list') }}" class="btn btn-danger btn-md">Trash list</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="print-table100" class="table custom-table">
                            <thead>
                                <tr>
                                    <th>SL:</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Brand</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($allProduct as $key => $value)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            {{ $value->title }}
                                        </td>
                                        <td>
                                            {{ $value->category->title }}
                                        </td>
                                        <td>
                                            {{ $value->brand->title }}
                                        </td>
                                        <td> <img src="{{ $value->image_url}}" alt="No Image"  width="50" /></td>
                                        </td>
                                        <td><span class="badge badge-info"> {{ $value->status }}</span></td>

                                        <td>
                                            <a href="{{ route('product.edit', $value->id) }}" title="Edit Row"><span
                                                    class="btn btn-info btn-md"><i class="icon-edit1"></i></span></a>
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
                        @include('pages.product.trash-modal')
                        <!-- ################# Small modal ####################-->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
