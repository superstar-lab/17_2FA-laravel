@extends('layouts.app')

@section('content')

    <div class="card card-custom overflow-hidden">
        <div class="card-body p-0">
            <!-- begin: Invoice-->
            <!-- begin: Invoice header-->
            <div class="row justify-content-center bgi-size-cover bgi-no-repeat py-8 px-8 py-md-27 px-md-0" style="background-image: url('{{asset('dashboard/media/bg/bg-6.jpg')}}');padding: 50px 10px">
                <div class="col-md-9">
                    <div class="d-flex justify-content-between pb-10 pb-md-20 flex-column flex-md-row">
                        <h1 class="display-4 text-white font-weight-boldest mb-10">Sells and Trades</h1>
                        <div class="d-flex flex-column align-items-md-end px-0">
                            <!--begin::Logo-->
                            <a href="#" class="mb-5 text-decoration-none text-white font-weight-bolder">
                                <h2>GC BUYING</h2>
                            </a>
                            <!--end::Logo-->
                            <span class="text-white d-flex flex-column align-items-md-end opacity-70">

														</span>
                        </div>
                    </div>
                    <div class="border-bottom w-100 opacity-20"></div>
                    <div class="d-flex justify-content-between text-white pt-6">
                        <div class="d-flex flex-column flex-root">
                            <span class="font-weight-bolde mb-2r">DATE</span>
                            <span class="opacity-70">{{$order->created_at->toDateString()}}</span>
                        </div>
                        <div class="d-flex flex-column flex-root">
                            <span class="font-weight-bolde mb-2r">UPDATED AT</span>
                            <span class="opacity-70">{{$order->updated_at->toDateString()}}</span>
                        </div>
                        <div class="d-flex flex-column flex-root">
                            <span class="font-weight-bolder mb-2">TRANSACTION ID</span>
                            <span class="opacity-70">{{$order->txn_id}}</span>
                        </div>
                        <div class="d-flex flex-column flex-root">
                            <span class="font-weight-bolder mb-2">INVOICE TO.</span>
                            <span class="opacity-70">{{$order->user->name}}<br> {{$order->user->email}}</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end: Invoice header-->
                    <!-- begin: Invoice body-->
                    <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0" style="padding: 50px 10px">
                        <div class="col-md-9">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th class="pl-0 font-weight-bold text-muted text-uppercase">Type</th>
                                        <th class="text-right font-weight-bold text-muted text-uppercase">Sell Amount</th>
                                        <th class="text-right font-weight-bold text-muted text-uppercase">Rate</th>
                                        <th class="text-right pr-0 font-weight-bold text-muted text-uppercase">Get Amount</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr class="font-weight-boldest font-size-lg">
                                        <td class="pl-0 pt-7">{{$order->method}}</td>
                                        <td class="text-right pt-7">{{$order->total_amount}}</td>
                                        <td class="text-right pt-7">{{$order->rate}}</td>
                                        <td class="text-danger pr-0 pt-7 text-right">N {{$order->get_amount}}</td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- end: Invoice body-->
        <!-- begin: Invoice footer-->
            <div class="row justify-content-center bg-gray-100 py-8 px-8 py-md-10 px-md-0">
                <div class="col-md-9">
                    <div class="d-flex justify-content-between flex-column flex-md-row font-size-lg">
                        <div class="d-flex flex-column mb-10 mb-md-0">
                            <div class="font-weight-bolder font-size-lg mb-3">Details</div>

                            <div class="d-flex justify-content-between mb-3">
                                <span class="mr-15 font-weight-bold">Status</span>
                                <span class="text-right">{{$order->status}}</span>
                            </div>
                            <div class="d-flex justify-content-between mb-3">
                                <span class="mr-15 font-weight-bold">Order Notes</span>
                                <span class="text-right">{{$order->note}}</span>
                            </div>
                        </div>
                        <div class="d-flex flex-column text-md-right">
                            <span class="font-size-lg font-weight-bolder mb-1">TOTAL AMOUNT</span>
                            <span class="font-size-h2 font-weight-boldest text-danger mb-1">N {{$order->get_amount}}</span>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <span class="mr-15 font-weight-bold">Comment</span>
                        <span class="text-right">{{$order->comment}}</span>
                    </div>
                </div>
            </div>
            <div class="row">

                @foreach($order->images as $image)
                    <div class="col-md-6">
                    <div class="card ml-auto mr-auto" style="max-width: 360px">
                        <div class="card-header card-header-image">
                            <a href="{{asset('image/'.$image->image)}}">
                                <img class="img" src="{{asset('image/'.$image->image)}}" rel="nofollow">
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach


            </div>
            <!-- end: Invoice footer-->
            <!-- begin: Invoice action-->
            <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0" style="padding: 50px 10px">
                <div class="col-md-9">
                    <div class="d-flex justify-content-between">
                        <button type="button" class="btn btn-light-primary font-weight-bold" onclick="window.print();">Download Invoice</button>
                        <button type="button" class="btn btn-primary font-weight-bold" onclick="window.print();">Print Invoice</button>
                    </div>
                </div>
            </div>
            <!-- end: Invoice action-->
            <!-- end: Invoice-->
        </div>
    </div>
    <!-- end::Card-->





    <script src="{{ asset('backend/js/core/jquery.min.js') }}" type="text/javascript"></script>




@endsection
