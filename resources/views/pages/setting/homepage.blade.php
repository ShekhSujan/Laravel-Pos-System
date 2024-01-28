@extends('backend.layouts.app')
@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Home Page Setting</a></li>
        </ol>
    </div>
    <div class="main-container">
        <div class="row  gutters">
            @include('backend.pages.extra.message')
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="active-user-chatting">
                            <div class="active-user-info">
                                <div class="avatar-info">
                                    <h5>Home Page Setting</h5>
                                </div>
                            </div>
                        </div>
                        <form action="{{ route('setting.home_update') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group row">
                                        <label for="inputSubject" class="col-sm-2">Service1 Title</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="service_title1" class="form-control"
                                                value="{{ $home->service_title1 }}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group row">
                                        <label for="inputSubject" class="col-sm-2">Service1 Description</label>
                                        <div class="col-sm-6">
                                            <textarea type="text" name="title1_description" class="form-control">{{ $home->title1_description }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group row">
                                        <label for="inputSubject" class="col-sm-2">Service2 Title</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="service_title2" class="form-control"
                                                value="{{ $home->service_title2 }}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group row">
                                        <label for="inputSubject" class="col-sm-2">Service2 Description</label>
                                        <div class="col-sm-6">
                                            <textarea type="text" name="title2_description" class="form-control">{{ $home->title2_description }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group row">
                                        <label for="inputSubject" class="col-sm-2">Service3 Title</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="service_title3" class="form-control"
                                                value="{{ $home->service_title3 }}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group row">
                                        <label for="inputSubject" class="col-sm-2">Service3 Description</label>
                                        <div class="col-sm-6">
                                            <textarea type="text" name="title3_description" class="form-control">{{ $home->title3_description }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group row">
                                        <label for="inputSubject" class="col-sm-2">Service4 Title</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="service_title4" class="form-control"
                                                value="{{ $home->service_title4 }}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group row">
                                        <label for="inputSubject" class="col-sm-2">Service4 Description</label>
                                        <div class="col-sm-6">
                                            <textarea type="text" name="title4_description" class="form-control">{{ $home->title4_description }}</textarea>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group row">
                                        <label for="inputSubject" class="col-sm-2">About Title</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="about_title" class="form-control"
                                                value="{{ $home->about_title }}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group row">
                                        <label for="inputSubject" class="col-sm-2">About Short Description</label>
                                        <div class="col-sm-6">
                                            <textarea type="text" name="about_subtitle" class="form-control">{{ $home->about_subtitle }}</textarea>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group row">
                                        <label for="inputSubject" class="col-sm-2">About Tags</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="about_tag" data-role="tagsinput"
                                                class="form-control" value="{{ $home->about_tag }}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group row">
                                        <label for="inputSubject" class="col-sm-2">About <span class="text-danger">[560,
                                                500]</span></label>
                                        <div class="col-sm-6">
                                            <input class="form-control dropify" data-bs-height="100"
                                                data-default-file="{{ $home->image_url['about']??'' }}"
                                                name="about" type="file"><br>
                                        </div>
                                    </div>
                                    <hr>
                                </div>




                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group row">
                                        <label for="inputSubject" class="col-sm-2">Name</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="name" class="form-control"
                                                value="{{ $home->name }}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group row">
                                        <label for="inputSubject" class="col-sm-2">Designation</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="designation" class="form-control"
                                                value="{{ $home->designation }}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group row">
                                        <label for="inputSubject" class="col-sm-2">Title</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="bio_title" class="form-control"
                                                value="{{ $home->bio_title }}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group row">
                                        <label for="inputSubject" class="col-sm-2">Short Description</label>
                                        <div class="col-sm-6">
                                            <textarea type="text" name="bio_description" class="form-control">{{ $home->bio_description }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group row">
                                        <label for="inputSubject" class="col-sm-2">Image<span class="text-danger">[750,
                                                625]</span></label>
                                        <div class="col-sm-6">
                                            <input class="form-control dropify" data-bs-height="100"
                                                data-default-file="{{ $home->image_url['bio']??'' }}"
                                                name="bio" type="file"><br>
                                        </div>
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
@endsection
