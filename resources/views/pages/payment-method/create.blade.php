@extends('layouts.app')
@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('payment-method.index') }}">New Payment Method</a></li>
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
                                    <h5>New Payment Method</h5>
                                </div>
                            </div>
                            <div class="chat-actions">
                                <a href="{{ route('payment-method.create') }}" class="btn btn-info btn-md">Add New</a>
                                <a href="{{ route('payment-method.index') }}" class="btn btn-success btn-md">All Payment
                                    Method</a>
                                <a href="{{ route('payment-method.trash_list') }}" class="btn btn-danger btn-md">Trash
                                    list</a>
                            </div>
                        </div>
                        <form action="{{ route('payment-method.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2" for="title">title</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="title" class="form-control"
                                                value="{{ old('title') }}" placeholder="Enter title" required />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                    <button type="submit" name="submit" class="btn btn-primary btn-md btn-block">Save
                                        Payment Method</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
