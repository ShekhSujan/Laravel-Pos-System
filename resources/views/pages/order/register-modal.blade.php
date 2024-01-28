@if (@$cashRegister->status == 'open')
    <div class="modal fade" id="customModalTwo" tabindex="-1" role="dialog" aria-labelledby="customModalTwoLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="customModalTwoLabel"> Cash Register</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('cash.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">

                        <input type="hidden" class="form-control" name="id" value="{{ $cashRegister->id }}">
                        <div class="form-group">
                            <label for="title" class="col-form-label">Title:</label>
                            <input type="text" class="form-control" name="title"
                                value="{{ $cashRegister->title }}">
                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="closing" class="col-form-label">Closing:</label>
                                <input type="text" class="form-control" name="closing">
                            </div>
                            <div class="form-group col-6">
                                <label for="closing_time" class="col-form-label">Closing Time:</label>
                                <input type="datetime-local" class="form-control" name="closing_time">
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer custom">
                        <div class="left-side">
                            <button type="button" class="btn btn-link danger" data-dismiss="modal">Cancel</button>
                        </div>
                        <div class="divider"></div>
                        <div class="right-side">
                            <button type="submit" class="btn btn-link success">Close Register</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@else
    <div class="modal fade" id="customModalTwo" tabindex="-1" role="dialog" aria-labelledby="customModalTwoLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="customModalTwoLabel"> Cash Register</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('cash.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="title" class="col-form-label">Title:</label>
                            <input type="text" class="form-control" name="title">
                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="opening" class="col-form-label">Opening:</label>
                                <input type="text" class="form-control" name="opening">
                            </div>
                            <div class="form-group col-6">
                                <label for="opening_time" class="col-form-label">Opening Time:</label>
                                <input type="datetime-local" class="form-control" name="opening_time">
                            </div>

                        </div>

                    </div>
                    <div class="modal-footer custom">

                        <div class="left-side">
                            <button type="button" class="btn btn-link danger" data-dismiss="modal">Cancel</button>
                        </div>
                        <div class="divider"></div>
                        <div class="right-side">
                            <button type="submit" class="btn btn-link success">Open Register</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endif
