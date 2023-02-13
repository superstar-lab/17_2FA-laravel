@extends('layouts.app')

@section('content')

    <div class="row justify-content-center align-items-center">
        <div class="col-md-6">
            <div class="card card-custom bg-white gutter-b">
                <div class="card-body">
                    <h2 class="card-title text-center">
                        <i class="fas fa-landmark mr-3 text-primary font-size-h1"></i>
                        <strong>Payment Details</strong>
                    </h2>
                    <hr class="border-danger"/>
                    @if (\Session::has('success'))

                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{!! \Session::get('success') !!}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <table class="table">
                        <tr>
                            <td><strong>Bank Name/Network</strong></td>

                            <td>{{$bank->bank_name}}</td>
                        </tr>
                        <tr>
                            <td><strong>Account Name</strong></td>

                            <td>{{$bank->account_name}}</td>
                        </tr>
                        <tr>
                            <td><strong>Account Number/Bitcoin Address</strong></td>

                            <td>{{$bank->account_no}}</td>
                        </tr>
                    </table>
                    <hr />
                    <div class="text-center">
                        <button class="btn btn-primary font-weight-bold" data-toggle="modal" data-target="#loginModal">
                            Click to Update Bank Details
                        </button>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal-->
    <div class="modal fade" id="loginModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Bank Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" data-feather="x"></i>
                    </button>
                </div>

                <div class="modal-body">
                    <form class="form" method="post" action="{{route('bank.update')}}">
                        @csrf
                        <div class="card-body">

                            <div class="form-group bmd-form-group">
                                <div class="input-group">

                                    <input type="text" name="bank_name" class="form-control" placeholder="Bank Name .....">
                                </div>
                            </div>

                            <div class="form-group bmd-form-group">
                                <div class="input-group">

                                    <input type="text" name="account_name" class="form-control" placeholder="Account Name .....">
                                </div>
                            </div>

                            <div class="form-group bmd-form-group">
                                <div class="input-group">

                                    <input type="text" name="account_no" placeholder="Account No..." class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-center">
                            <button class="btn btn-primary font-weight-bold">Update Account</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>





    <script src="{{ asset('backend/js/core/jquery.min.js') }}" type="text/javascript"></script>




@endsection
