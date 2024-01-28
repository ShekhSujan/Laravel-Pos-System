@extends('layouts.app')
@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('setting') }}">Site Settings</a></li>
        </ol>
    </div>
    <div class="main-container">
        <div class="row gutters">
            @include('pages.extra.message')
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
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                    aria-orientation="vertical">
                                    <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home"
                                        role="tab" aria-controls="v-pills-home" aria-selected="true">
                                        Logo
                                    </a><br>

                                </div>
                            </div>
                            <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12">

                                <div class="tab-content" id="v-pills-tabContent">
                                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                        <form action="{{ route('setting.update') }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row gutters">

                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <div class="form-group">
                                                        <label for="inputSubject" class="col-form-label">Logo <span class="text-danger">[178 *
                                                                40]</span></label>
                                                        <input class="form-control dropify" data-bs-height="100"
                                                            data-default-file="{{ $selected->logo_url }}" name="logo" type="file"><br>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <div class="form-group">
                                                        <label for="white_logo" class="col-form-label">Footer Logo <span class="text-danger">[178 *
                                                                40]</span></label>
                                                        <input class="form-control dropify" data-bs-height="100"
                                                            data-default-file="{{ $selected->white_logo_url }}" name="white_logo" type="file"
                                                            style="background: #e4e6e7;"><br>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <div class="form-group">
                                                        <label for="inputSubject" class="col-form-label">Favicon</label>
                                                        <input class="form-control dropify" data-bs-height="100"
                                                            data-default-file="{{ $selected->favicon_url }}" name="favicon" type="file"><br>
                                                    </div>
                                                    <hr>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                                    <div class="form-group pl-1">
                                                        <button type="button" class="btn btn-primary btn-block" data-toggle="modal"
                                                            data-target=".bd-example-modal-sm-update">Update
                                                            Setting</button>
                                                    </div>
                                                </div>

                                            </div>
                                            @include('pages.modal.update-modal')
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
