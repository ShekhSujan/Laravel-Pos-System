@extends('backend.layouts.app')
@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('setting') }}">Site Settings</a></li>
        </ol>
    </div>
    <div class="main-container">
        <div class="row gutters">
            @include('backend.pages.extra.message')
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card m-0">
                    <div class="card-header">
                        <div class="active-user-chatting">
                            <div class="active-user-info">
                                <div class="avatar-info">
                                    <h5>Update Setting</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row gutters">
                            <form action="{{ route('home.update') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row gutters">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="form-group row">
                                            <label for="inputSubject" class="col-form-label col-sm-2">Banner Title</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="banner_title" class="form-control"
                                                    value="{{ $home->banner_title }}" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label for="inputSubject" class="col-form-label">Banner SubTitle</label>
                                            <input type="text" name="banner_subtitle" class="form-control"
                                                value="{{ $home->banner_subtitle }}" />
                                            <br>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label for="inputSubject" class="col-form-label">Banner <span
                                                    class="text-danger">[1920,
                                                    732]</span></label>
                                            <input class="form-control dropify" data-bs-height="100"
                                                data-default-file="{{ asset('assets/backend/images/home/banner.webp') }}"
                                                name="banner" type="file"><br>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label for="inputSubject" class="col-form-label">About Title</label>
                                            <input type="text" name="about_title" class="form-control"
                                                value="{{ $home->about_title }}" />
                                            <br>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label for="inputSubject" class="col-form-label">About SubTitle</label>
                                            <input type="text" name="about_subtitle" class="form-control"
                                                value="{{ $home->about_subtitle }}" />
                                            <br>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label for="inputSubject" class="col-form-label">About <span
                                                    class="text-danger">[710, 415] png
                                                </span></label>
                                            <input class="form-control dropify" data-bs-height="100"
                                                data-default-file="{{ asset('assets/backend/images/home/about.png') }}"
                                                name="about" type="file"><br>
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label for="inputSubject" class="col-form-label">Service1 Title</label>
                                            <input type="text" name="service_title1" class="form-control"
                                                value="{{ $home->service_title1 }}" />
                                            <br>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label for="inputSubject" class="col-form-label">Service1 Description</label>
                                            <textarea type="text" name="title1_description" class="form-control">{{ $home->title1_description }}</textarea>
                                            <br>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label for="inputSubject" class="col-form-label">Service 1 <span
                                                    class="text-danger">[640,
                                                    360]</span></label>
                                            <input class="form-control dropify" data-bs-height="100"
                                                data-default-file="{{ asset('assets/backend/images/home/service1.webp') }}"
                                                name="service1" type="file"><br>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label for="inputSubject" class="col-form-label">Service2 Title</label>
                                            <input type="text" name="service_title2" class="form-control"
                                                value="{{ $home->service_title2 }}" />
                                            <br>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label for="inputSubject" class="col-form-label">Service2 Description</label>
                                            <textarea type="text" name="title2_description" class="form-control">{{ $home->title2_description }}</textarea>
                                            <br>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label for="inputSubject" class="col-form-label">Service 2 <span
                                                    class="text-danger">[640,
                                                    360]</span></label>
                                            <input class="form-control dropify" data-bs-height="100"
                                                data-default-file="{{ asset('assets/backend/images/home/service2.webp') }}"
                                                name="service2" type="file"><br>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label for="inputSubject" class="col-form-label">Service3 Title</label>
                                            <input type="text" name="service_title3" class="form-control"
                                                value="{{ $home->service_title3 }}" />
                                            <br>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label for="inputSubject" class="col-form-label">Service3 Description</label>
                                            <textarea type="text" name="title3_description" class="form-control">{{ $home->title3_description }}</textarea>
                                            <br>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label for="inputSubject" class="col-form-label">Service3 <span
                                                    class="text-danger">[640,
                                                    360]</span></label>
                                            <input class="form-control dropify" data-bs-height="100"
                                                data-default-file="{{ asset('assets/backend/images/home/service3.webp') }}"
                                                name="service3" type="file"><br>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label for="inputSubject" class="col-form-label">Product Title</label>
                                            <input type="text" name="product_title" class="form-control"
                                                value="{{ $home->product_title }}" />
                                            <br>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label for="inputSubject" class="col-form-label">Product SubTitle</label>
                                            <textarea type="text" name="product_subtitle" class="form-control">{{ $home->product_subtitle }}</textarea>
                                            <br>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label for="inputSubject" class="col-form-label">Product Bg <span
                                                    class="text-danger">[1920,
                                                    600]</span></label>
                                            <input class="form-control dropify" data-bs-height="100"
                                                data-default-file="{{ asset('assets/backend/images/home/product.webp') }}"
                                                name="product" type="file"><br>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="form-group pl-1">
                                            <button type="button" class="btn btn-primary btn-block" data-toggle="modal"
                                                data-target=".bd-example-modal-sm-update">Update Home
                                                Setting</button>
                                        </div>
                                    </div>

                                </div>
                                @include('backend.pages.modal.update-modal')
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
