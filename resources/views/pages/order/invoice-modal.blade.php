<div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myExtraLargeModalLabel">Recent Invoice </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-container">
                    <div class="table-responsive">
                        <table class="table custom-table table-sm">
                            <thead>
                                <tr>
                                    <th>SL:</th>
                                    <th>OrderId</th>
                                    <th>subtotal</th>
                                    <th>tax</th>
                                    <th>discount</th>
                                    <th>total</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($allOrder as $key => $value)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td> {{ $value->orderid }} </td>
                                        <td> {{ $value->subtotal }} </td>
                                        <td> {{ $value->tax }} </td>
                                        <td> {{ $value->discount }} </td>
                                        <td> {{ $value->total }} </td>
                                        <td>
                                            <form action="{{ route('order.order_update') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $value->id }}" />
                                                <select name="status">
                                                    <option value="{{ 'draft' }}" @selected($value->status == 'draft')>
                                                        Draft
                                                    </option>
                                                    <option value="{{ 'active' }}" @selected($value->status == 'active')>
                                                        Active
                                                    </option>
                                                </select>
                                                <button type="submit" class="btn btn-danger btn-sm"><i
                                                        class="icon-check2"></i></i></button>
                                            </form>
                                        </td>
                                        <td class="d-flex">
                                            <a href="{{ route('invoice', $value->id) }}" title="View Row"
                                                target="_blank" style="width: unset;  height: unset;">
                                                <span class="btn btn-info btn-md"><i  class="icon-eye"></i></span>
                                            </a>
                                            <a href="{{ route('pos_invoice', $value->id) }}" title="View Row"
                                                target="_blank" style="width: unset;  height: unset;">
                                                <span class="btn btn-success btn-md"><i class="icon-print"></i></span>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
