@extends('backend.layouts.app')
@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Custom CSS / JS</a></li>
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
                                    <h5>Custom CSS / JS</h5>
                                </div>
                            </div>
                        </div>
                        <form action="{{ route('css_script.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row gutters">

                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2" for="header">Header Section</label>
                                        <div class="col-sm-8">
                                            <textarea name="header" class="form-control" value="" placeholder="Header Section" style="height:300px;">{{ $selected->header }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2" for="body">Body Section</label>
                                        <div class="col-sm-8">
                                            <textarea name="body" class="form-control" value="" placeholder="Body Section" style="height:300px;">{{ $selected->body }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2" for="footer">Footer Section</label>
                                        <div class="col-sm-8">
                                            <textarea name="footer" class="form-control" value="" placeholder="footer Section" style="height:300px;">{{ $selected->footer }}</textarea>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2" for="details_page">Details Page</label>
                                        <div class="col-sm-8">
                                            <textarea name="details_page" class="form-control" value="" placeholder="Details Page Section"
                                                style="height:300px;">{{ $selected->details_page }}</textarea>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                    <div class="form-group row">
                                        <button type="button" class="btn btn-primary btn-md btn-block" data-toggle="modal"
                                            data-target=".bd-example-modal-sm-update">Update Css Script</button>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <!-- ################# Small modal ####################-->
                    @include('backend.pages.modal.update-modal')
                    <!-- Main container end -->
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
