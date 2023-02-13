@extends('multiauth::layouts.app')

@section('content')

    <div class="row justify-content-center align-items-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header card-header-icon card-header-rose">
                    <div class="card-icon">
                        <i class="material-icons">bitcoin</i>
                    </div>
                </div>
                <div class="card-body">
                    <h3 class="card-title text-center"><strong>Bitcoin</strong></h3>
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
                            <td><strong>Bitcoin Address</strong></td>

                            <td>{{$bitcoin->address}}</td>
                        </tr>
                        <tr>
                            <td><strong>Naira rate per USD</strong></td>
                            <td>{{$bitcoin->rate}}</td>
                        </tr>

                    </table>
                    <hr />
                    <div class="text-center">
                        <button class="btn btn-round btn-rose" data-toggle="modal" data-target="#loginModal">
                            Update Info<i class="material-icons">assignment</i>
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="loginModal" tabindex="-1" role="">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="card card-signup card-plain">
                    <div class="modal-header">
                        <div class="card-header card-header-primary text-center">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                <i class="material-icons">clear</i>
                            </button>

                            <h4 class="card-title">Update Bitcoin Info</h4>
                        </div>
                    </div>
                    <div class="modal-body">
                        <form class="form" method="post" action="{{route('admin.bitcoin.update')}}">
                            @csrf
                            @method('PUT')
                            <div class="card-body">


                                <div class="form-group bmd-form-group">
                                    <div class="input-group">
                                        <input class="form-control" type="text" name="address" placeholder="bitcoin address" id="">
                                    </div>
                                </div>

                                <div class="form-group bmd-form-group">
                                    <div class="input-group">
                                        <input class="form-control" type="text" name="rate"  placeholder="Naira Rate per USD" id="">
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer justify-content-center">
                                <button class="btn btn-primary btn-wd btn-lg">Update Orders</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>



    <script src="{{ asset('backend/js/core/jquery.min.js') }}" type="text/javascript"></script>




@endsection
