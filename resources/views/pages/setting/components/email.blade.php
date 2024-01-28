<div class="tab-pane fade show" id="v-pills-email" role="tabpanel" aria-labelledby="v-pills-email-tab">
    <form action="{{ route('email.update') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{ $selected->id }}">
        <div class="row gutters">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="form-group">
                    <label for="email" class="col-form-label">Email</label>
                    <input class="form-control" name="email" type="email" value="{{ $selected->email }}">
                </div>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="form-group">
                    <label for="cc" class="col-form-label">Cc</label>
                    <input class="form-control" name="cc" type="text" value="{{ $selected->cc }}">
                </div>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="form-group">
                    <label for="bcc" class="col-form-label">Bcc</label>
                    <input class="form-control" name="bcc" type="text" value="{{ $selected->bcc }}">
                </div>
                <hr>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="form-group">
                    <label for="site_email" class="col-form-label">Site Email</label>
                    <input class="form-control" name="site_email" type="text" value="{{ $selected->site_email }}">
                </div>
                <hr>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="form-group">
                    <label for="phone" class="col-form-label">Phone</label>
                    <input class="form-control" name="phone" type="text" value="{{ $selected->phone }}">
                </div>
                <hr>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="form-group">
                    <label for="address" class="col-form-label">Address</label>
                    <input class="form-control" name="address" type="text" value="{{ $selected->address }}">
                </div>
                <hr>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="form-group">
                    <label for="map" class="col-form-label">Map</label>
                    <textarea class="form-control" name="map" type="text" value="">{{ $selected->map }}</textarea>
                </div>
                <hr>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="form-group pl-1">
                    <button type="submit" class="btn btn-primary btn-block">Update Email</button>
                </div>
            </div>

        </div>
    </form>
</div>
