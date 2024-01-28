@extends('layouts.app')
@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('cash.index') }}">All CashRegister</a></li>
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
                                <h5>All CashRegister</h5>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="print-table100" class="table custom-table">
                            <thead>
                                <tr>
                                    <th>SL:</th>
                                    <th>Title</th>
                                    <th>Opening</th>
                                    <th>OpeningTime</th>
                                    <th>Closing</th>
                                    <th>ClosingTime</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($allCashRegister as $key => $value)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $value->title }}</td>
                                        <td>{{ $value->opening }}</td>
                                        <td>{{ $value->opening_time ? date('F j, Y, g:i a', strtotime($value->opening_time)) : '' }}
                                        </td>
                                        <td>{{ $value->closing }}</td>
                                        <td>{{ $value->closing_time ? date('F j, Y, g:i a', strtotime($value->closing_time)) : '' }}
                                        </td>
                                        <td><span class="badge badge-info"> {{ $value->status }}</span></td>
                                        <td>
                                            <button type="button" class="btn btn-danger btn-md delete-id"
                                                id="{{ $value->id }}" data-toggle="modal"
                                                data-target=".bd-example-modal-sm" onclick="modalview(this.id)"
                                                title="Trash Number"><i class="icon-x"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                        <!-- ################# Small modal ####################-->
                        @include('pages.cash.trash-modal')
                        <!-- ################# Small modal ####################-->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
