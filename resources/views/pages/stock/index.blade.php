@extends('layouts.app')
@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Product List</a></li>
        </ol>
    </div>
    <div class="main-container">
        <div class="row  gutters">
            @include('pages.extra.message')
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                <div class="table-container">
                    <div class="active-user-chatting">
                        <div class="active-user-info">
                            <div class="avatar-info">
                                <h5>All Product</h5>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="print-table200" class="table custom-table">
                            <thead>
                                <tr>
                                    <th>SL:</th>
                                    <th>Product</th>
                                    <th>Total</th>
                                    <th>Sale</th>
                                    <th>Available</th>
                                    <th>Safety Stock</th>
                                    <th>Suggestion</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($allProduct as $key => $value)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td> {{ $value->title }}</td>
                                        <td>{{ $value->sumOfStockWithType1() }}</td>
                                        <td>{{ $value->sumOfStockWithType2() }}</td>
                                        @if ($value->hasStock())
                                            <td>  <span  class="badge badge-success">{{ $value->sumOfStockWithType1() - $value->sumOfStockWithType2() }}</span>  </td>
                                            <td><span class="badge badge-success">1</span></td>
                                        @else
                                            <td> <span  class="badge badge-danger">{{ $value->sumOfStockWithType1() - $value->sumOfStockWithType2() }}</span>  </td>
                                            <td><span class="badge badge-danger">1</span></td>
                                        @endif

                                        <td> {!! $value->stockStatus() !!}</td>
                                        <td class="d-flex">
                                            <button type="button" class="btn btn-primary btn-md" data-toggle="modal"
                                                data-target=".stock" onclick="modalstock('{{ $value->id }}')"
                                                title="Stock Add"><i class="icon-plus"></i></button>
                                            <a href="{{ route('stock.product', $value->id) }}" title="View Stock"><span
                                                    class="btn btn-info btn-md"><i class="icon-eye"></i></span></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                        <!-- ################# Small modal ####################-->
                        @include('pages.stock.stock-modal')
                        <!-- ################# Small modal ####################-->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
