@extends('backend.layouts.app')
@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('tag.index') }}">Edit GallaryTag</a></li>
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
                                    <h5>Edit GallaryTag</h5>
                                </div>
                            </div>
                            <div class="chat-actions">
                                <a href="{{ route('tag.create') }}" class="btn btn-info btn-md">Add New</a>
                                <a href="{{ route('tag.index') }}" class="btn btn-success btn-md">All GallaryTag</a>
                                <a href="{{ route('tag.trash_list') }}" class="btn btn-danger btn-md">Trash list</a>
                            </div>
                        </div>
                        <form action="{{ route('tag.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $selected->id }}">
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
                                        <label for="" class="col-sm-2" for="status">Status</label>
                                        <div class="col-sm-4">
                                            <select class="form-control" name="status" required>
                                                @if ($selected->status == 1)
                                                    <option value="0">InActive</option>
                                                    <option selected value="1">Active</option>
                                                @else
                                                    <option selected value="0">InActive</option>
                                                    <option value="1">Active</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                    <div class="form-group row">
                                        <button type="button" class="btn btn-primary btn-md btn-block" data-toggle="modal"
                                            data-target=".bd-example-modal-sm-update">Update
                                            GallaryTag</button>
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
