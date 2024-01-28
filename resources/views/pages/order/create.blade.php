@extends('layouts.app')
@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('order.create') }}">New Order</a></li>
        </ol>
    </div>
    @if (session('msg'))
        <script>
            $(document).ready(function() {
                $(".clear-cart").trigger("click");
                location.reload();
            });
        </script>
    @endif
    <style>
        .my_invoice_2 .quotation_table table tr,
        th,
        td {
            border: 1px solid #d9dee4;
        }

        :not(.input-group)>.bootstrap-select.form-control:not([class*=col-]) {
            width: 70px !important;
        }

        td.highlight {
            background-color: unset !important;
        }
    </style>
    <script>
        function validateInput(input) {
            const value = parseFloat(input.value);
            const errorMessage = document.getElementById('errorMessage');

            if (isNaN(value) || value <= 0) {
                errorMessage.style.display = 'block';
            } else {
                errorMessage.style.display = 'none';
            }
        }
    </script>
    <div class="main-container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="active-user-chatting p-0 m-0" style="border:none;">
                            <div class="chat-actions">
                                <button type="button" class="btn btn-info" data-toggle="modal"
                                    data-target="#customModalTwo">
                                    Cash Register
                                </button>
                                @include('pages.order.register-modal')
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target=".bd-example-modal-xl">Recent Invoice</button>
                                @include('pages.order.invoice-modal')
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            @include('pages.extra.message')
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card m-0">
                    <div class="card-body">

                        <form action="{{ route('order.store') }}" method="GET">
                            <table class="table custom-table">
                                <thead>
                                    <tr>
                                        <th data-orderable="false">SL</th>
                                        <th data-orderable="false">Product</th>
                                        <th data-orderable="false">Price</th>
                                        <th data-orderable="false">Qty</th>
                                        <th data-orderable="false">Total</th>
                                        <th data-orderable="false">Ac</th>
                                    </tr>
                                </thead>
                                <tbody class="show-cart">

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="3" class="text-right border-right">Subtotal:</td>
                                        <td class="border-right">Qty:
                                            <span class="total-count"></span>
                                            <input type="hidden" class="totalqty" value="" name="totalqty" />
                                        </td>
                                        <td colspan="2">
                                            <span class="total-cart"></span>
                                            <input type="hidden" class="totalamount" value="" name="subtotal" />
                                        </td>
                                    </tr>
                                    @if ($invoiceSetting->discount == 1)
                                        <tr>
                                            <td colspan="4" class="text-right border-right">Discount:</td>
                                            <td colspan="2">
                                                <span class="discount"></span>
                                                <input type="number" min="0" class="discount w-75" value="0"
                                                    name="discount" id="positiveNumber" oninput="validateInput(this)" />
                                                <p id="errorMessage" style="color: red; display: none;">Please enter valid
                                                    amount or 0</p>

                                            </td>

                                        </tr>
                                    @endif
                                    @if ($invoiceSetting->tax_status == 1)
                                        <tr>
                                            <td colspan="4" class="text-right border-right">Tax:</td>
                                            <td colspan="2">
                                                <span class="tax"></span>
                                                <input type="hidden" class="tax" value="" name="tax" />
                                            </td>
                                        </tr>
                                    @endif
                                    <tr>
                                        <td colspan="4" class="text-right border-right">Total:</td>
                                        <td colspan="2">
                                            <span class="total totaldiscount"></span>
                                            <input type="hidden" class="total" value="" name="total" />
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                            <div class="row">
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                    <label for="date">date</label>
                                    <input type="date" class="form-control" value="{{ date('Y-m-d') }}" name="date" />
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                    <label for="email">Method</label>
                                    <select class="form-control" name="method_id" required>
                                        @foreach ($allPaymentMethod as $method)
                                            <option value="{{ $method->id }}">{{ $method->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                    <label for="email">Status</label>
                                    <select class="form-control" name="status" required>
                                        <option value="{{ 'active' }}">Active</option>
                                        <option value="{{ 'draft' }}">Draft</option>
                                    </select>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-right pt-2 pb-5">
                                    @if (@$cashRegister->status == 'open')
                                        <button type="button" class="clear-cart btn btn-danger btn-sm form-control col-4">Clear
                                            Cart</button>
                                        <button type="submit" class="btn btn-primary btn-sm form-control col-4"
                                            id="">Checkout</button>
                                    @else
                                        <p class="text-danger text-center">Open Register First</p>
                                    @endif
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card m-0">
                    <div class="card-body">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home"
                                    role="tab" aria-controls="pills-home" aria-selected="true">All</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile"
                                    role="tab" aria-controls="pills-profile" aria-selected="false">Featured</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact"
                                    role="tab" aria-controls="pills-contact" aria-selected="false">Offer</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                aria-labelledby="pills-home-tab">
                                <table id="highlightRowColumn" class="table custom-table">
                                    <thead>
                                        <tr>
                                            <th data-orderable="false">Product</th>
                                            <th data-orderable="false">Price/Stock</th>
                                            <th data-orderable="false">Add</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($allProduct as $key => $value)
                                            <tr>
                                                <td>{{ $value->title }}</td>
                                                <td>{{ $value->price() }}</td>
                                                <td>
                                                    @if ($value->stock_availability)
                                                        <a href="#" class="btn btn-primary btn-sm add-to-cart"
                                                            data-name="{{ $value->title }}"
                                                            data-id='{{ $value->id }}'
                                                            data-price='{{ $value->price() }}'><span
                                                                class="icon-plus"></span>
                                                        </a>
                                                    @else
                                                        <div class="">
                                                            <span style="font-size: 12px;" class="text-danger">Sold
                                                                out</span>
                                                        </div>
                                                    @endif
                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                aria-labelledby="pills-profile-tab">
                                <table id="highlightRowColumn2" class="table custom-table">
                                    <thead>
                                        <tr>
                                            <th data-orderable="false">Product</th>
                                            <th data-orderable="false">Price/Stock</th>
                                            <th data-orderable="false">Add</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($allProduct->where('feature',1) as $key => $value)
                                            <tr>
                                                <td>{{ $value->title }}</td>
                                                <td>{{ $value->price() }}</td>
                                                <td>
                                                    @if ($value->stock_availability)
                                                        <a href="#" class="btn btn-primary btn-sm add-to-cart"
                                                            data-name="{{ $value->title }}"
                                                            data-id='{{ $value->id }}'
                                                            data-price='{{ $value->price() }}'><span
                                                                class="icon-plus"></span>
                                                        </a>
                                                    @else
                                                        <div class="">
                                                            <span style="font-size: 12px;" class="text-danger">Sold
                                                                out</span>
                                                        </div>
                                                    @endif
                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                                aria-labelledby="pills-contact-tab">
                                <table id="highlightRowColumn1" class="table custom-table">
                                    <thead>
                                        <tr>
                                            <th data-orderable="false">Product</th>
                                            <th data-orderable="false">Price/Stock</th>
                                            <th data-orderable="false">Add</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($allOfferProduct as $key => $value)
                                            <tr>
                                                <td>{{ $value->title }}</td>
                                                <td>{{ $value->price() }}</td>
                                                <td>
                                                    @if ($value->stock_availability)
                                                        <a href="#" class="btn btn-primary btn-sm add-to-cart"
                                                            data-name="{{ $value->title }}"
                                                            data-id='{{ $value->id }}'
                                                            data-price='{{ $value->price() }}'><span
                                                                class="icon-plus"></span>
                                                        </a>
                                                    @else
                                                        <div class="">
                                                            <span style="font-size: 12px;" class="text-danger">Sold
                                                                out</span>
                                                        </div>
                                                    @endif
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
    </div>
    <script>
        // ************************************************
        // Shopping Cart API
        // ************************************************

        var shoppingCart = (function() {
            // =============================
            // Private methods and propeties
            // =============================
            cart = [];
            // Constructor
            function Item(id, name, price, count) {
                this.id = id;
                this.name = name;
                this.price = price;
                this.count = count;
            }

            // Save cart
            function saveCart() {
                sessionStorage.setItem('shoppingCart', JSON.stringify(cart));
            }

            // Load cart
            function loadCart() {
                cart = JSON.parse(sessionStorage.getItem('shoppingCart'));
            }
            if (sessionStorage.getItem("shoppingCart") != null) {
                loadCart();
            }


            // =============================
            // Public methods and properties
            // =============================
            var obj = {};

            // Add to cart
            obj.addItemToCart = function(id, name, price, count) {
                for (var item in cart) {
                    if (cart[item].id === id) {
                        cart[item].count++;
                        saveCart();
                        return;
                    }
                }
                var item = new Item(id, name, price, count);
                cart.push(item);
                saveCart();
            }
            // Set count from item
            obj.setCountForItem = function(id, count) {
                for (var i in cart) {
                    if (cart[i].id === id) {
                        cart[i].count = count;
                        break;
                    }
                }
            };
            // Remove item from cart
            obj.removeItemFromCart = function(id) {
                for (var item in cart) {
                    if (cart[item].id === id) {
                        cart[item].count--;
                        if (cart[item].count === 0) {
                            cart.splice(item, 1);
                        }
                        break;
                    }
                }
                saveCart();
            }

            // Remove all items from cart
            obj.removeItemFromCartAll = function(id) {
                for (var item in cart) {
                    if (cart[item].id === id) {
                        cart.splice(item, 1);
                        break;
                    }
                }
                saveCart();
            }

            // Clear cart
            obj.clearCart = function() {
                cart = [];
                saveCart();
            }

            // Count cart
            obj.totalCount = function() {
                var totalCount = 0;
                for (var item in cart) {
                    totalCount += cart[item].count;
                }
                return totalCount;
            }

            // Total cart
            obj.totalCart = function() {
                var totalCart = 0;
                for (var item in cart) {
                    totalCart += cart[item].price * cart[item].count;
                }
                return Number(totalCart.toFixed(2));
            }

            // List cart
            obj.listCart = function() {
                var cartCopy = [];
                for (i in cart) {
                    item = cart[i];
                    itemCopy = {};
                    for (p in item) {
                        itemCopy[p] = item[p];
                    }
                    itemCopy.total = Number(item.price * item.count).toFixed(2);
                    cartCopy.push(itemCopy)
                }
                return cartCopy;
            }

            // cart : Array
            // Item : Object/Class
            // addItemToCart : Function
            // removeItemFromCart : Function
            // removeItemFromCartAll : Function
            // clearCart : Function
            // countCart : Function
            // totalCart : Function
            // listCart : Function
            // saveCart : Function
            // loadCart : Function
            return obj;
        })();


        // *****************************************
        // Triggers / Events
        // *****************************************
        // Add item
        $('.add-to-cart').click(function(event) {
            event.preventDefault();
            var id = $(this).data('id');
            var name = $(this).data('name');
            var price = Number($(this).data('price'));
            shoppingCart.addItemToCart(id, name, price, 1);
            displayCart();
        });

        // Clear items
        $('.clear-cart').click(function() {
            shoppingCart.clearCart();
            displayCart();
        });

        function displayCart() {
            var cartArray = shoppingCart.listCart();
            var output = "";
            var j = 1;
            for (var i in cartArray) {
                output += `<tr>
                <td> ${j++}</td>
                <td>
                    <input type="hidden" name="id[]" value="${cartArray[i].id}"/>
                    ${cartArray[i].name}
                    </td>
                <td>
                    <input type="hidden" name="unit_price[]" value="${cartArray[i].price}"/>
                    ${cartArray[i].price}
                    </td>
                <td>
                    <div class='input-group d-flex flex-nowrap'>
                        <button class='minus-item input-group-addon btn btn-primary btn-sm' data-id=${cartArray[i].id}>-</button>
                        <input name="qty[]" type='number' readonly class='item-count input-sm' min='1' data-id='${cartArray[i].id}' value='${cartArray[i].count}' style='width:40px;'>
                        <button class='plus-item btn btn-primary input-group-addon btn-sm' data-id=${cartArray[i].id}>+</button>
                    </div>
                </td>
                <td>
                    <input type="hidden" name="total_price[]" value="${cartArray[i].total}"/>
                    ${cartArray[i].total}
                    </td>
                <td><button class='delete-item btn btn-danger btn-sm' data-id=${cartArray[i].id}><span class='icon-x'></span></button></td>
                </tr>`;
            }
            $('.show-cart').html(output);
            $('.total-cart').html(shoppingCart.totalCart());
            $('.total-count').html(shoppingCart.totalCount());
            $('.totalamount').val(shoppingCart.totalCart());
            $('.totalqty').val(shoppingCart.totalCount());

            @if ($invoiceSetting->tax_status == 1)
                var taxamount = {{ $invoiceSetting->tax }};
                var tax = shoppingCart.totalCart() * taxamount / 100;
                $('.tax').text(tax.toFixed(2));
                $('.tax').val(tax.toFixed(2));

                var total = shoppingCart.totalCart() + tax;
                $('.total').text(total.toFixed(2));
                $('.total').val(total.toFixed(2));
            @else
                var total = shoppingCart.totalCart();
                $('.total').text(total.toFixed(2));
                $('.total').val(total.toFixed(2));
            @endif

        }
        // Delete item button

        $(document).ready(function() {
            $('.discount').on("keyup", function(event) {
                displayCart();
                var discount = $(this).val();
                var total = parseFloat($('.total-cart').text());
                var d = (discount === d || discount === '') ? 0 : parseFloat(discount);
                var newTotal = (total - discount);

                @if ($invoiceSetting->tax_status == 1)
                    var taxamount = {{ $invoiceSetting->tax }};
                    var tax = newTotal * taxamount / 100;
                    $('.tax').text(tax.toFixed(2));
                    $('.tax').val(tax.toFixed(2));
                    var finalTotal = (newTotal + tax);
                @else
                    var finalTotal = newTotal;
                @endif
                $('.total').text('').text(finalTotal.toFixed(2));
                $('.total').val('').val(finalTotal.toFixed(2));
            });
        });


        $('.show-cart').on("click", ".delete-item", function(event) {
            var id = $(this).data('id')
            shoppingCart.removeItemFromCartAll(id);
            $('.discount').val(0);
            displayCart();
        })


        // -1
        $('.show-cart').on("click", ".minus-item", function(event) {
            var id = $(this).data('id')
            shoppingCart.removeItemFromCart(id);
            displayCart();
        })
        // +1
        $('.show-cart').on("click", ".plus-item", function(event) {
            var id = $(this).data('id')
            shoppingCart.addItemToCart(id);
            $('.discount').val(0);
            displayCart();
        })

        // Item count input
        $('.show-cart').on("change", ".item-count", function(event) {
            var id = $(this).data('id');
            var count = Number($(this).val());
            shoppingCart.setCountForItem(id, count);
            displayCart();
        });

        displayCart();
    </script>
@endsection
