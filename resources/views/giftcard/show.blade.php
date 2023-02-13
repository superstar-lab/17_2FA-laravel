@extends('layouts.app')

@section('content')

    <div class="card card-custom overflow-hidden">
        <div class="card-body p-0">
            <!-- begin: Invoice-->
            <!-- begin: Invoice header-->
            <div class="row justify-content-center bgi-size-cover bgi-no-repeat py-8 px-8 py-md-27 px-md-0" style="background-image: url('{{asset('dashboard/media/bg/bg-6.jpg')}}');padding: 50px 10px">
                <div class="col-md-9">
                    <div class="d-flex justify-content-between pb-10 pb-md-20 flex-column flex-md-row">
                        <h1 class="display-4 text-white font-weight-boldest mb-10">Giftcard</h1>
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
                            <span class="opacity-70">{{$cardorder->created_at->toDateString()}}</span>
                        </div>
                        <div class="d-flex flex-column flex-root">
                            <span class="font-weight-bolde mb-2r">UPDATED AT</span>
                            <span class="opacity-70">{{$cardorder->updated_at->toDateString()}}</span>
                        </div>
                        <div class="d-flex flex-column flex-root">
                            <span class="font-weight-bolder mb-2">TRANSACTION ID</span>
                            <span class="opacity-70">{{$cardorder->txid}}</span>
                        </div>
                        <div class="d-flex flex-column flex-root">
                            <span class="font-weight-bolder mb-2">INVOICE TO.</span>
                            <span class="opacity-70">{{$cardorder->user->name}}<br> {{$cardorder->user->email}}</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end: Invoice header-->
{{--            <!-- begin: Invoice body-->--}}
{{--            <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0">--}}
{{--                <div class="col-md-9">--}}
{{--                    <div class="table-responsive">--}}
{{--                        <table class="table">--}}
{{--                            <thead>--}}
{{--                            <tr>--}}
{{--                                <th class="pl-0 font-weight-bold text-muted text-uppercase">Description</th>--}}
{{--                                <th class="text-right font-weight-bold text-muted text-uppercase">Hours</th>--}}
{{--                                <th class="text-right font-weight-bold text-muted text-uppercase">Rate</th>--}}
{{--                                <th class="text-right pr-0 font-weight-bold text-muted text-uppercase">Amount</th>--}}
{{--                            </tr>--}}
{{--                            </thead>--}}
{{--                            <tbody>--}}
{{--                            <tr class="font-weight-boldest font-size-lg">--}}
{{--                                <td class="pl-0 pt-7">Creative Design</td>--}}
{{--                                <td class="text-right pt-7">80</td>--}}
{{--                                <td class="text-right pt-7">$40.00</td>--}}
{{--                                <td class="text-danger pr-0 pt-7 text-right">$3200.00</td>--}}
{{--                            </tr>--}}
{{--                            <tr class="font-weight-boldest border-bottom-0 font-size-lg">--}}
{{--                                <td class="border-top-0 pl-0 py-4">Front-End Development</td>--}}
{{--                                <td class="border-top-0 text-right py-4">120</td>--}}
{{--                                <td class="border-top-0 text-right py-4">$40.00</td>--}}
{{--                                <td class="text-danger border-top-0 pr-0 py-4 text-right">$4800.00</td>--}}
{{--                            </tr>--}}
{{--                            <tr class="font-weight-boldest border-bottom-0 font-size-lg">--}}
{{--                                <td class="border-top-0 pl-0 py-4">Back-End Development</td>--}}
{{--                                <td class="border-top-0 text-right py-4">210</td>--}}
{{--                                <td class="border-top-0 text-right py-4">$60.00</td>--}}
{{--                                <td class="text-danger border-top-0 pr-0 py-4 text-right">$12600.00</td>--}}
{{--                            </tr>--}}
{{--                            </tbody>--}}
{{--                        </table>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <!-- end: Invoice body-->--}}
            <!-- begin: Invoice footer-->
            <div class="row justify-content-center bg-gray-100 py-8 px-8 py-md-10 px-md-0" style="padding: 50px 10px">
                <div class="col-md-9">
                    <div class="d-flex justify-content-between flex-column flex-md-row font-size-lg">
                        <div class="d-flex flex-column mb-10 mb-md-0">
                            <div class="font-weight-bolder font-size-lg mb-3">Mobile Recharge</div>
                            <div class="d-flex justify-content-between mb-3">
                                <span class="mr-15 font-weight-bold">Giftcard Name</span>
                                <span class="text-right">{{$cardorder->giftcard->name}}</span>
                            </div>
                            <div class="d-flex justify-content-between mb-3">
                                <span class="mr-15 font-weight-bold">Email:</span>
                                <span class="text-right">{{$cardorder->email}}</span>
                            </div>
                            <div class="d-flex justify-content-between mb-3">
                                <span class="mr-15 font-weight-bold">Amount in BTC</span>
                                <span class="text-right">{{$cardorder->amount_btc}}</span>
                            </div>
                            <div class="d-flex justify-content-between mb-3">
                                <span class="mr-15 font-weight-bold">Amount in USD</span>
                                <span class="text-right">{{$cardorder->amount_usd}}</span>
                            </div>
                            <div class="d-flex justify-content-between mb-3">
                                <span class="mr-15 font-weight-bold">Status</span>
                                <span class="text-right">{{$cardorder->status}}</span>
                            </div>
                            <div class="d-flex justify-content-between mb-3">
                                <span class="mr-15 font-weight-bold">Extra Information</span>
                                <span class="text-right">{{$cardorder->note}}</span>
                            </div>
                        </div>
                        <div class="d-flex flex-column text-md-right">
                            <span class="font-size-lg font-weight-bolder mb-1">RECHARGE AMOUNT</span>
                            <span class="font-size-h2 font-weight-boldest text-danger mb-1">N {{$cardorder->amount_base}}</span>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <span class="mr-15 font-weight-bold">Comment</span>
                        <span class="text-right">{{$cardorder->comment}}</span>
                    </div>
                </div>
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
