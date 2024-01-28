@extends('layouts.app')
@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="#">Invoice Setting</a></li>
        </ol>
    </div>
    <div class="main-container">
        <div class="row gutters">
            @include('pages.extra.message')
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card m-0">
                    <div class="card-header">
                        <div class="card-title">Update Setting</div>
                    </div>
                    <div class="card-body">
                        <div class="row gutters">
                            <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12">

                                <div class="tab-content" id="v-pills-tabContent">
                                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                                        aria-labelledby="v-pills-home-tab">
                                        <form action="{{ route('invoice.setting.update') }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $selected->id }}">
                                            <input type="hidden" name="image_name" value="{{ $selected->image }}">
                                            <input type="hidden" name="pad_name" value="{{ $selected->pad }}">
                                            <input type="hidden" name="qr_name" value="{{ $selected->qr }}">
                                            <div class="row gutters">
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <div class="form-group row">
                                                        <label for="" class="col-sm-2" for="input-title">Company
                                                            <span class="text-danger">*</span></label>
                                                        <div class="col-sm-8">
                                                            <input type="text" name="title" class="form-control"
                                                                value="{{ $selected->title }}" placeholder="Enter Title" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <div class="form-group row">
                                                        <label for="" class="col-sm-2" for="input-email">Email
                                                            <span class="text-danger">*</span></label>
                                                        <div class="col-sm-8">
                                                            <input type="text" name="email" class="form-control"
                                                                value="{{ $selected->email }}" placeholder="Enter Email" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <div class="form-group row">
                                                        <label for="" class="col-sm-2" for="input-phone">Phone
                                                            <span class="text-danger">*</span></label>
                                                        <div class="col-sm-8">
                                                            <input type="text" name="phone" class="form-control"
                                                                value="{{ $selected->phone }}" placeholder="Enter Phone" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <div class="form-group row">
                                                        <label for="" class="col-sm-2" for="input-address">Address
                                                            <span class="text-danger">*</span></label>
                                                        <div class="col-sm-8">
                                                            <input type="text" name="address" class="form-control"
                                                                value="{{ $selected->address }}"
                                                                placeholder="Enter Address" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <div class="form-group row">
                                                        <label class="col-sm-2" for="tax_status">Tax</label>
                                                        <div class="col-sm-8">
                                                            <div class="custom-control custom-radio custom-control-inline">
                                                                <input type="radio" name="tax_status" value="1" id="tax_status1"
                                                                    class="custom-control-input"  {{ $selected->tax_status == 1 ? 'checked' : '' }}>
                                                                <label class="custom-control-label" for="tax_status1">Yes</label>
                                                            </div>
                                                            <div class="custom-control custom-radio custom-control-inline">
                                                                <input type="radio" name="tax_status" value="0" id="tax_status2"
                                                                     class="custom-control-input"  {{ $selected->tax_status == 1 ? '' : 'checked' }}>
                                                                <label class="custom-control-label" for="tax_status2">No</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <div class="form-group row">
                                                        <label for="" class="col-sm-2" for="tax">Tax (%)
                                                            <span class="text-danger">*</span></label>
                                                        <div class="col-sm-8">
                                                            <input type="number" name="tax" class="form-control"
                                                                value="{{ $selected->tax }}" placeholder="Enter tax" />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <div class="form-group row">
                                                        <label class="col-sm-2" for="discount">Discount</label>
                                                        <div class="col-sm-8">
                                                            <div class="custom-control custom-radio custom-control-inline">
                                                                <input type="radio" name="discount" value="1" id="discount1"
                                                                    class="custom-control-input"  {{ $selected->discount == 1 ? 'checked' : '' }}>
                                                                <label class="custom-control-label" for="discount1">Yes</label>
                                                            </div>
                                                            <div class="custom-control custom-radio custom-control-inline">
                                                                <input type="radio" name="discount" value="0" id="discount2"
                                                                     class="custom-control-input"  {{ $selected->discount == 1 ? '' : 'checked' }}>
                                                                <label class="custom-control-label" for="discount2">No</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <div class="form-group row">
                                                        <label for="" class="col-sm-2" for="input-favicon">Invoice Logo
                                                            <span class="text-danger"></span></label>
                                                        <div class="col-sm-8">
                                                            <input class="form-control dropify" data-bs-height="100"
                                                                data-default-file="{{$selected->image_url }}"
                                                                name="image" type="file"><br>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <div class="form-group row">
                                                        <label for="" class="col-sm-2" for="pad">Invoice Pad
                                                            <span class="text-danger"></span></label>
                                                        <div class="col-sm-8">
                                                            <input class="form-control dropify" data-bs-height="100"
                                                                data-default-file="{{$selected->pad_url }}"
                                                                name="pad" type="file"><br>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <div class="form-group row">
                                                        <label for="" class="col-sm-2" for="qr">Qr Code
                                                            <span class="text-danger">[200*200]</span></label>
                                                        <div class="col-sm-8">
                                                            <input class="form-control dropify" data-bs-height="100"
                                                                data-default-file="{{$selected->qr_url }}"
                                                                name="qr" type="file"><br>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                    <div class="form-group pl-1">
                                                        <button type="submit" class="btn btn-primary btn-block">Update
                                                            Setting</button>
                                                    </div>
                                                </div>

                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
