@extends('layouts.app')
@section('content')

    <div class="page-header">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Edit Product</a></li>
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
                                    <h5>Edit Product</h5>
                                </div>
                            </div>
                            <div class="chat-actions">
                                <a href="{{ route('product.create') }}" class="btn btn-info btn-md">Add New</a>
                                <a href="{{ route('product.index') }}" class="btn btn-success btn-md">All Product</a>
                                <a href="{{ route('product.trash_list') }}" class="btn btn-danger btn-md">Trash list</a>
                            </div>
                        </div>
                        <form action="{{ route('product.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $selected->id }}">
                            <input type="hidden" name="image_name" value="{{ $selected->image }}">
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2" for="input-email">Title <span
                                                class="text-danger">*</span></label>
                                        <div class="col-sm-8">
                                            <input type="text" name="title" class="form-control"
                                                value="{{ $selected->title }}" placeholder="Enter Title" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2" for="sku">sku <span
                                                class="text-danger">*</span></label>
                                        <div class="col-sm-8">
                                            <input type="text" name="sku" class="form-control"
                                                value="{{ $selected->sku }}" placeholder="Enter Sku"  />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group row">
                                        <label class="col-sm-2" for=" category_id">Category <span
                                                class="text-danger">*</span></label>
                                        <div class="col-sm-4">
                                            <select class="form-control" name="category_id" required>
                                                @foreach ($allCategory as $value)
                                                    <option value="{{ $value->id }}" @selected($value->id == $selected->category_id)>
                                                        {{ $value->title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group row">
                                        <label class="col-sm-2" for="brand_id">Brand <span
                                                class="text-danger">*</span></label>
                                        <div class="col-sm-4">
                                            <select class="form-control" name="brand_id" >
                                                <option value="">none</option>
                                                @foreach ($allBrand as $value)
                                                    <option value="{{ $value->id }}" @selected($value->id == $selected->brand_id)>
                                                        {{ $value->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2" for="buy_price">Buying Price <span
                                                class="text-danger">*</span></label>
                                        <div class="col-sm-4">
                                            <input type="text" name="buy_price" class="form-control"
                                                value="{{$selected->buy_price}}" placeholder="Enter Buying Price"
                                                 />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2" for="selling_price">Selling Price <span
                                                class="text-danger">*</span></label>
                                        <div class="col-sm-4">
                                            <input type="text" name="selling_price" class="form-control"
                                                value="{{$selected->selling_price}}" placeholder="Enter Selling Price"
                                                 />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group row">
                                        <label class="col-sm-2" for="offer">Offer</label>
                                        <div class="col-sm-4">
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="offer" value="1" id="offer1"
                                                    class="custom-control-input"  {{ $selected->offer == 1 ? 'checked' : '' }}>
                                                <label class="custom-control-label" for="offer1">Yes</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="offer" value="0" id="offer2"
                                                     class="custom-control-input"  {{ $selected->offer == 1 ? '' : 'checked' }}>
                                                <label class="custom-control-label" for="offer2">No</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2" for="offer_price">Offer Price <span
                                                class="text-danger">*</span></label>
                                        <div class="col-sm-4">
                                            <input type="text" name="offer_price" class="form-control"
                                                value="{{$selected->offer_price}}" placeholder="Enter Offer Price"
                                                 />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2" for="offer_validity">Offer Validity <span
                                                class="text-danger">*</span></label>
                                        <div class="col-sm-4">
                                            <input type="date" name="offer_validity" class="form-control"
                                                value="{{$selected->offer_validity}}" placeholder="Enter Offer Validity"
                                                 />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group row">
                                        <label class="col-sm-2" for="feature">Featured</label>
                                        <div class="col-sm-4">
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="feature" value="1" id="feature1"
                                                    class="custom-control-input"  {{ $selected->feature == 1 ? 'checked' : '' }}>
                                                <label class="custom-control-label" for="feature1">Yes</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="feature" value="0" id="feature2"
                                                     class="custom-control-input" {{ $selected->feature == 1 ? '' : 'checked' }}>
                                                <label class="custom-control-label" for="feature2">No</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="input-email">Upload Image <span
                                                class="text-danger">[200*200]</span></label>
                                        <div class="col-sm-4">
                                            <input class="form-control dropify" data-bs-height="100"
                                                data-default-file="{{ $selected->image_url}}"
                                                name="image" type="file">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2" for="status">Status</label>
                                        <div class="col-sm-4">
                                            <select class="form-control" name="status" required>
                                                <option value="{{ 'active' }}" @selected($selected->status->value == 'active')>Active
                                                </option>
                                                <option value="{{ 'inactive' }}" @selected($selected->status->value == 'inactive')>Inactive
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <hr>
                                </div>

                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                    <div class="form-group row">
                                        <button type="button" class="btn btn-primary btn-md btn-block"
                                            data-toggle="modal" data-target=".bd-example-modal-sm-update">Update
                                            Product</button>
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
