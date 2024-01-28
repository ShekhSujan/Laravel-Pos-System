@extends('layouts.app')
@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('stock.index') }}">Edit Stock</a></li>
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
                                    <h5>Edit Stock</h5>
                                </div>
                            </div>
                            <div class="chat-actions">
                                <a href="{{ route('stock.index') }}" class="btn btn-success btn-md">All Stock</a>
                            </div>
                        </div>
                        <form action="{{ route('stock.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $selected->id }}">
                            <input type="hidden" name="ext" value="webp">
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2" for="in_date">Date <span
                                                class="text-danger">*</span></label>
                                        <div class="col-sm-4">
                                            <input type="date" name="in_date" class="form-control"
                                                value="{{ $selected->in_date }}" placeholder="Enter Date" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2" for="in_qty">Qty <span
                                                class="text-danger">*</span></label>
                                        <div class="col-sm-4">
                                            <input type="number" name="in_qty" class="form-control"
                                                value="{{ $selected->in_qty }}" placeholder="Enter Qty" min="1"
                                                required />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2" for="supplier_id">Supplier <span
                                                class="text-danger">*</span></label>
                                        <div class="col-sm-4">
                                            <select name="supplier_id" class="form-control selectpicker"
                                                data-live-search="true" required>
                                                @foreach ($allSupplier as $value)
                                                    <option value="{{ $value->id }}">{{ $value->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                    <div class="form-group row">
                                        <button type="button" class="btn btn-primary btn-md btn-block" data-toggle="modal"
                                            data-target=".bd-example-modal-sm-update">Update
                                            Stock</button>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <!-- ################# Small modal ####################-->
                    @include('pages.modal.update-modal')
                    <!-- Main container end -->
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
