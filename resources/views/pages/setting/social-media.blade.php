@extends('backend.layouts.app')
@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Social Media</a></li>
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
								    <h5>Social Media Link</h5>
								</div>
							</div>
						</div>
                        <form action="{{ route('social_media.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2" for="fb_page">Facebook Page</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="fb_page" class="form-control"
                                                value="{{ $selected->fb_page }}" placeholder="Enter Facebook Page" />
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2" for="input-email">Twitter</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="twitter" class="form-control"
                                                value="{{ $selected->twitter }}" placeholder="Enter Twitter" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2" for="input-email">Instagram</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="instagram" class="form-control"
                                                value="{{ $selected->instagram }}" placeholder="Enter Instagram" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2" for="input-email">Linkedin</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="linkedin" class="form-control"
                                                value="{{ $selected->linkedin }}" placeholder="Enter Linkedin" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2" for="input-email">Youtube</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="youtube" class="form-control"
                                                value="{{ $selected->youtube }}" placeholder="Enter Youtube" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <hr>
                                      <div class="form-group row">
                                          <label for="" class="col-sm-2" for="input-email">Fb Comment Js</label>
                                          <div class="col-sm-8">
                                              <textarea name="fb_comment_js" class="form-control" value="" placeholder="Enter Fb Comment Js">{{ $selected->fb_comment_js }}</textarea>
                                              <div class="form-text text-muted">
                                                <p class="help-block ">Reference Link:
                                                    <a href="https://developers.facebook.com/docs/plugins/comments" target="_blank">https://developers.facebook.com/docs/plugins/comments</a>
                                                </p>
                                             </div>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                      <div class="form-group row">
                                          <label for="" class="col-sm-2" for="input-email">Fb Comment Code</label>
                                          <div class="col-sm-8">
                                              <input type="number" name="fb_comment_code" class="form-control" value="{{ $selected->fb_comment_code }}"  placeholder="Number of comments">
                                          </div>
                                      </div>
                                      <hr>
                                  </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                    <div class="form-group row">
                                        <button type="button" class="btn btn-primary btn-md btn-block" data-toggle="modal"
                                            data-target=".bd-example-modal-sm-update">Update Social Media</button>
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
