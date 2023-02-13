@extends('multiauth::layouts.app')

@section('content')

    <div class="row justify-content-center align-items-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header card-header-icon card-header-rose">
                    <div class="card-icon">
                        <i class="material-icons">order</i>
                    </div>
                </div>
                <div class="card-body">
                    <h3 class="card-title text-center"><strong>Order Details</strong></h3>
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
                            <td><strong>Transaction ID</strong></td>

                            <td>{{$order->txid}}</td>
                        </tr>
                        <tr>
                            <td><strong>Placed By</strong></td>
                            <td><a href="{{route('admin.users.show',$order->user->id)}}">{{$order->user->name}}</a></td>
                        </tr>
                        <tr>
                            <td><strong>Phone</strong></td>

                            <td>{{$order->phone}}</td>
                        </tr>
                        <tr>
                            <td><strong>Operator Name</strong></td>

                            <td>{{$order->operator->name ?? ''}}</td>
                        </tr>
                        <tr>
                            <td><strong>Naira Amount</strong></td>

                            <td>{{$order->amount_naira}} N</td>
                        </tr>
                        <tr>
                            <td><strong>BTC Amount</strong></td>

                            <td>{{$order->amount_btc}}</td>
                        </tr>
                        <tr>
                            <td><strong>USD Amount</strong></td>

                            <td>{{$order->amount_usd}}</td>
                        </tr>

                        <tr>
                            <td><strong>Order Status</strong></td>

                            <td>{{$order->status}}</td>
                        </tr>
                        <tr>
                            <td><strong>Created at</strong></td>

                            <td>{{$order->created_at}}</td>
                        </tr>
                        <tr>
                            <td><strong>Updated at</strong></td>

                            <td>{{$order->updated_at}}</td>
                        </tr>
                        <tr>
                            <td><strong>Extra Information</strong></td>

                            <td>{{$order->note}}</td>
                        </tr>
                        <tr>
                            <td><strong>Comment</strong></td>

                            <td>{{$order->comment}}</td>
                        </tr>


                    </table>

                    <div class="text-center">
                        <button class="btn btn-round btn-rose" data-toggle="modal" data-target="#loginModal">
                            Update Orders<i class="material-icons">assignment</i>
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

                            <h4 class="card-title">Update Orders</h4>
                        </div>
                    </div>
                    <div class="modal-body">
                        <form class="form" method="post" action="{{route('admin.rechargeorders.update',['id' => $order->id])}}">
                            @csrf
                            @method('PUT')
                            <div class="card-body">

                                <div class="form-group bmd-form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="material-icons">info</i></div>
                                        </div>
                                            <select class="selectpicker" name="status" data-style="btn btn-primary btn-round" title="Single Select">
                                                <option disabled selected>Select Status</option>
                                                 <option value="Completed">Completed</option>
                                                <option value="Processing">Processing</option>
                                                <option value="Suspended">Suspended</option>
                                                <option value="Pending">Pending</option>
                                                <option value="Cancelled">Cancelled</option>

                                            </select>

                                    </div>
                                </div>

                                <div class="form-group bmd-form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="material-icons">comment</i></div>
                                        </div>
                                        <textarea placeholder="Comment" name="comment" class="form-control" rows="5"></textarea>
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
