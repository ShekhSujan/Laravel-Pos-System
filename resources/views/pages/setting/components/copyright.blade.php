<div class="tab-pane fade show" id="v-pills-copyright" role="tabpanel"
aria-labelledby="v-pills-copyright-tab">
<form action="{{ route('copyright.update') }}" method="post"
    enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{ $selected->id }}">
    <div class="row gutters">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="form-group">
                <label for="copyright" class="col-form-label">Copyright
                    Title</label>
                <input class="form-control" name="copyright" type="text"
                    value="{{ $selected->copyright }}">
            </div>
        </div>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="form-group">
                <label for="copyright_url" class="col-form-label">Copyright
                    Link</label>
                <input class="form-control" name="copyright_url" type="text"
                    value="{{ $selected->copyright_url }}">
            </div>
            <hr>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="form-group pl-1">
                <button type="submit" class="btn btn-primary btn-block">Update Copyright</button>
            </div>
        </div>

    </div>
</form>
</div>
