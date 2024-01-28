<div class="tab-pane fade show" id="v-pills-color" role="tabpanel" aria-labelledby="v-pills-color-tab">
    <form action="{{ route('color.update') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{ $selected->id }}">
        <div class="row gutters">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="form-group">
                    <label for="copyright" class="col-form-label">Color </label>
                    <input type="text" name="color" class="form-control" value="{{ $selected->color }}"
                        placeholder="Enter Color" />
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="form-group">
                    <script>
                        $(document).ready(function() {
                            $('#colorpicker').on('input', function() {
                                $('#hexcolor').val(this.value);
                            });
                            $('#hexcolor').on('input', function() {
                                $('#colorpicker').val(this.value);
                            });
                        });

                        function myFunction() {
                            var copyText = document.getElementById("hexcolor");
                            copyText.select();
                            copyText.setSelectionRange(0, 99999);
                            navigator.clipboard.writeText(copyText.value);
                        }
                    </script>
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Recipient's username"
                                aria-label="Recipient's username" aria-describedby="button-addon2"
                                pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" value="#009688" id="hexcolor">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button" id="button-addon2"
                                    onclick="myFunction()">Copy</button>
                            </div>
                        </div>
                    </div>

                    <input class="form-control" type="color" id="colorpicker" name="color"
                        pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" value="#009688">
                </div>
            </div>

            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="form-group pl-1">
                    <button type="submit" class="btn btn-primary btn-block">Update Copyright</button>
                </div>
            </div>

        </div>
    </form>
</div>
