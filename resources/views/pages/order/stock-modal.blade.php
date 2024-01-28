<div class="modal fade bd-example-modal-sm-stock" id="model_button" tabindex="-1" role="dialog"
    aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('order.order_update') }}" method="POST">
                @csrf
                <input type="text" name="id" id="adid" value="">
                <div class="modal-body" id="">
                    <div class="form-group row">
                        <label class="col-sm-3" for="offer">Status</label>
                        <select name="order_process_status" class="form-control col-sm-9">
                            <option value="{{ 0 }}" @selected($value->order_process_status == 0)>Pending</option>
                            <option value="{{ 1 }}" @selected($value->order_process_status == 1)>Processing </option>
                            <option value="{{ 2 }}" @selected($value->order_process_status == 2)>Completed </option>
                            <option value="{{ 3 }}" @selected($value->order_process_status == 3)>Canceled </option>
                        </select>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3" for="offer">Offer</label>
                        <div class="col-sm-9">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="offer" value="1" id="offer1"
                                    class="custom-control-input">
                                <label class="custom-control-label" for="offer1">Yes</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="offer" value="0" id="offer2" checked
                                    class="custom-control-input">
                                <label class="custom-control-label" for="offer2">No</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success btn-sm">Trash</button>
                </div>
            </form>
        </div>
    </div>
</div>
