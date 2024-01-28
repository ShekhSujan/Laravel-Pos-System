<div class="modal fade bd-example-modal-sm stock" id="model_button" tabindex="-1" role="dialog"
    aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Stock Update</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('stock.store') }}" method="POST">
                @csrf
                <div class="modal-body" id="">
                    <div class="row">
                        <input type="hidden" name="product_id" id="stid" value="">
                        <div class="col-sm-4">
                            <label for="date" class="col-form-label">Stock</label>
                            <input type="date" name="in_date" class="form-control" value="{{ date('Y-m-d') }}"
                                required />
                        </div>
                        <div class="col-sm-2">
                            <label for="qty" class="col-form-label">Qty</label>
                            <input type="number" name="in_qty" class="form-control" min="1" value="1"
                                required />
                        </div>
                        <div class="col-sm-6">
                            <label for="supplier_id" class="col-form-label">Supplier</label>
                            <select name="supplier_id" class="form-control selectpicker" data-live-search="true"
                                required>
                                @foreach ($allSupplier as $value)
                                    <option value="{{ $value->id }}">{{ $value->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary btn-sm">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
