@extends('layouts.app')
@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('supplier.index') }}">New Supplier</a></li>
        </ol>
    </div>
    <div class="main-container">
        <div class="row  gutters">
            @include('pages.extra.message')
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="active-user-chatting">
                            <div class="active-user-info">
                                <div class="avatar-info">
                                    <h5>New Supplier</h5>
                                </div>
                            </div>
                            <div class="chat-actions">
                                <a href="{{ route('supplier.create') }}" class="btn btn-info btn-md">Add New</a>
                                <a href="{{ route('supplier.index') }}" class="btn btn-success btn-md">All Supplier</a>
                                <a href="{{ route('supplier.trash_list') }}" class="btn btn-danger btn-md">Trash list</a>
                            </div>
                        </div>
                        <form action="{{ route('supplier.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2" for="title">Title</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="title" class="form-control"
                                                value="{{ old('title') }}" placeholder="Enter title" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2" for="email">Email</label>
                                        <div class="col-sm-8">
                                            <input type="email" name="email" class="form-control"
                                                value="{{ old('email') }}" placeholder="Enter email" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2" for="mobile">mobile</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="mobile" class="form-control"
                                                value="{{ old('mobile') }}" placeholder="Enter mobile" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2" for="city">City</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="city" class="form-control"
                                                value="{{ old('city') }}" placeholder="Enter city" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2" for="zipcode">Zipcode</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="zipcode" class="form-control"
                                                value="{{ old('zipcode') }}" placeholder="Enter zipcode" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2" for="address">Address</label>
                                        <div class="col-sm-8">
                                            <textarea type="text" name="address" class="form-control" value="{{ old('address') }}" placeholder="Enter Answer"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                    <button type="submit" name="submit" class="btn btn-primary btn-md btn-block">Save Supplier</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
