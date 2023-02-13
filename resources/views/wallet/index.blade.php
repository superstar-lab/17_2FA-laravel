@extends('layouts.app')

@section('content')
    <!--begin::Dashboard-->
    <!--begin::Row-->
    <div class="row mt-0 mt-lg-3 match-height">
        <div class="col-lg-4 col-md-12">
            <!--begin::Mixed Widget 2-->
            <div class="card card-custom bg-gray-100 gutter-b card-stretch">
                <!--begin::Body-->
                <div class="card-body p-0 position-relative overflow-hidden">
                    <!--begin::Stats-->
                    <div class="card-spacer p-5 mt-n25">
                        <!--begin::Row-->
                        <div class="row m-0">
                            <div class="col bg-white px-6 py-8 rounded-xl mr-7 mb-7">
															<span class="svg-icon svg-icon-3x svg-icon-info d-block my-2">
																<!--begin::Svg Icon | path:dashboard/media/svg/icons/Media/Equalizer.svg-->
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">

                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                        <rect x="0" y="0" width="24" height="24"/>
                                                                        <path d="M4,6 L20,6 C20.5522847,6 21,6.44771525 21,7 L21,8 C21,8.55228475 20.5522847,9 20,9 L4,9 C3.44771525,9 3,8.55228475 3,8 L3,7 C3,6.44771525 3.44771525,6 4,6 Z M5,11 L10,11 C10.5522847,11 11,11.4477153 11,12 L11,19 C11,19.5522847 10.5522847,20 10,20 L5,20 C4.44771525,20 4,19.5522847 4,19 L4,12 C4,11.4477153 4.44771525,11 5,11 Z M14,11 L19,11 C19.5522847,11 20,11.4477153 20,12 L20,19 C20,19.5522847 19.5522847,20 19,20 L14,20 C13.4477153,20 13,19.5522847 13,19 L13,12 C13,11.4477153 13.4477153,11 14,11 Z" fill="#000000"/>
                                                                        <path d="M14.4452998,2.16794971 C14.9048285,1.86159725 15.5256978,1.98577112 15.8320503,2.4452998 C16.1384028,2.90482849 16.0142289,3.52569784 15.5547002,3.83205029 L12,6.20185043 L8.4452998,3.83205029 C7.98577112,3.52569784 7.86159725,2.90482849 8.16794971,2.4452998 C8.47430216,1.98577112 9.09517151,1.86159725 9.5547002,2.16794971 L12,3.79814957 L14.4452998,2.16794971 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                                                    </g>

																</svg>
                                                                <!--end::Svg Icon-->
															</span>
                                <a href="{{route('wallet.send')}}" class="text-warning font-weight-bold font-size-h6">Send Bitcoin</a>
                            </div>
                            <div class="col bg-white px-6 py-8 rounded-xl mb-7">
															<span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
																<!--begin::Svg Icon | path:dashboard/media/svg/icons/Communication/Add-user.svg-->
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                        <rect x="0" y="0" width="24" height="24"/>
                                                                        <rect fill="#000000" opacity="0.3" x="11" y="2" width="2" height="5" rx="1"/>
                                                                        <rect fill="#000000" opacity="0.3" x="11" y="16" width="2" height="5" rx="1"/>
                                                                        <path d="M17.875,14.086 C17.875,14.8206703 17.7293348,15.4381642 17.438,15.9385 C17.1466652,16.4388358 16.7603357,16.8409985 16.279,17.145 C15.7976643,17.4490015 15.2498364,17.6674993 14.6355,17.8005 C14.0211636,17.9335007 13.3910032,18 12.745,18 L7,18 L7,4.548 L12.745,4.548 C13.2643359,4.548 13.7963306,4.60183279 14.341,4.7095 C14.8856694,4.8171672 15.3796644,5.00083204 15.823,5.2605 C16.2663356,5.52016796 16.6273319,5.87166445 16.906,6.315 C17.1846681,6.75833555 17.324,7.32199658 17.324,8.006 C17.324,8.75333707 17.1213354,9.3708309 16.716,9.8585 C16.3106646,10.3461691 15.77867,10.6976656 15.12,10.913 C15.5000019,11.0143337 15.8578317,11.1314991 16.1935,11.3025 C16.5291683,11.4735009 16.8204988,11.6919987 17.0675,11.958 C17.3145012,12.2240013 17.5108326,12.5343316 17.6565,12.889 C17.8021674,13.2436684 17.875,13.6426645 17.875,14.086 Z M14.189,8.443 C14.189,7.98699772 14.0148351,7.65450105 13.6665,7.4455 C13.3181649,7.23649896 12.8020034,7.132 12.118,7.132 L10.522,7.132 L10.522,9.906 L12.27,9.906 C12.878003,9.906 13.3498317,9.78250124 13.6855,9.5355 C14.0211683,9.28849877 14.189,8.92433574 14.189,8.443 Z M14.626,13.782 C14.626,13.2246639 14.4170021,12.8383344 13.999,12.623 C13.5809979,12.4076656 13.0236701,12.3 12.327,12.3 L10.522,12.3 L10.522,15.378 L12.346,15.378 C12.5993346,15.378 12.8621653,15.3558336 13.1345,15.3115 C13.4068347,15.2671664 13.6538322,15.1880006 13.8755,15.074 C14.0971678,14.9599994 14.277666,14.798501 14.417,14.5895 C14.556334,14.380499 14.626,14.111335 14.626,13.782 Z" fill="#000000"/>
                                                                    </g>
																</svg>
                                                                <!--end::Svg Icon-->
															</span>
                                <a href="#" class="text-primary font-weight-bold font-size-h6 mt-2" data-toggle="modal" data-target="#exampleModalCenter">Receive Bitcoin</a>
                            </div>
                        </div>
                        <!--end::Row-->
                        <!--begin::Row-->
                        <div class="row m-0">
                            <div class="col bg-white px-6 py-8 rounded-xl mr-7">
															<span class="svg-icon svg-icon-3x svg-icon-danger d-block my-2">
																<!--begin::Svg Icon | path:dashboard/media/svg/icons/Design/Layers.svg-->
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                        <rect x="0" y="0" width="24" height="24"/>
                                                                        <rect fill="#000000" opacity="0.3" x="2" y="5" width="20" height="14" rx="2"/>
                                                                        <rect fill="#000000" x="2" y="8" width="20" height="3"/>
                                                                        <rect fill="#000000" opacity="0.3" x="16" y="14" width="4" height="2" rx="1"/>
                                                                    </g>
																</svg>
                                                                <!--end::Svg Icon-->
															</span>
                                <a href="{{route('wallet.sell')}}" class="text-danger font-weight-bold font-size-h6 mt-2">Sell Bitcoin From GCBUYING wallet</a>
                            </div>
                            <div class="col bg-white px-6 py-8 rounded-xl">
															<span class="svg-icon svg-icon-3x svg-icon-success d-block my-2">
																<!--begin::Svg Icon | path:dashboard/media/svg/icons/Communication/Urgent-mail.svg-->
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24"/>
                                                                    <path d="M2,6 L21,6 C21.5522847,6 22,6.44771525 22,7 L22,17 C22,17.5522847 21.5522847,18 21,18 L2,18 C1.44771525,18 1,17.5522847 1,17 L1,7 C1,6.44771525 1.44771525,6 2,6 Z M11.5,16 C13.709139,16 15.5,14.209139 15.5,12 C15.5,9.790861 13.709139,8 11.5,8 C9.290861,8 7.5,9.790861 7.5,12 C7.5,14.209139 9.290861,16 11.5,16 Z" fill="#000000" opacity="0.3" transform="translate(11.500000, 12.000000) rotate(-345.000000) translate(-11.500000, -12.000000) "/>
                                                                    <path d="M2,6 L21,6 C21.5522847,6 22,6.44771525 22,7 L22,17 C22,17.5522847 21.5522847,18 21,18 L2,18 C1.44771525,18 1,17.5522847 1,17 L1,7 C1,6.44771525 1.44771525,6 2,6 Z M11.5,16 C13.709139,16 15.5,14.209139 15.5,12 C15.5,9.790861 13.709139,8 11.5,8 C9.290861,8 7.5,9.790861 7.5,12 C7.5,14.209139 9.290861,16 11.5,16 Z M11.5,14 C12.6045695,14 13.5,13.1045695 13.5,12 C13.5,10.8954305 12.6045695,10 11.5,10 C10.3954305,10 9.5,10.8954305 9.5,12 C9.5,13.1045695 10.3954305,14 11.5,14 Z" fill="#000000"/>
                                                                </g>
																</svg>
                                                                <!--end::Svg Icon-->
															</span>
                                <a href="https://www.blockchain.com/btc/address/{{$balance->address}}" class="text-success font-weight-bold font-size-h6 mt-2">Transaction History</a>
                            </div>
                        </div>
                        <!--end::Row-->
                    </div>
                    <!--end::Stats-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Mixed Widget 2-->
        </div>

{{--        End Buttons--}}

        <div class="col-lg-4 col-md-6">
            <div class="card text-center">
                <div class="card-body">
                    <div class="avatar bg-light-info p-50 mb-1">
                        <div class="avatar-content">
                            <i data-feather="credit-card" class="font-medium-5"></i>
                        </div>
                    </div>
                    <h2 class="font-weight-bolder">{{$balance->available_balance}} BTC</h2>
                    @if($balance->pending_received_balance > 0)
                        <h6 class="text-right"> +{{$balance->pending_received_balance}} BTC <span class="text-warning">(pending)</span></h6>
                    @endif
                    <p class="card-text">Bitcoin Wallet Balance</p>
                </div>
            </div>

{{--            <div class="card card-custom gutter-b card-stretch wave wave-animate wave-primary mb-8 mb-lg-0">--}}
{{--                <div class="card-body">--}}
{{--                    <div class="d-flex align-items-center p-5">--}}
{{--                        <div class="mr-6">--}}
{{--														<span class="svg-icon svg-icon-6x svg-icon-warning">--}}
{{--																<!--begin::Svg Icon | path:dashboard/media/svg/icons/Communication/Add-user.svg-->--}}
{{--																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">--}}
{{--																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">--}}
{{--                                                                        <rect x="0" y="0" width="24" height="24"/>--}}
{{--                                                                        <rect fill="#000000" opacity="0.3" x="11" y="2" width="2" height="5" rx="1"/>--}}
{{--                                                                        <rect fill="#000000" opacity="0.3" x="11" y="16" width="2" height="5" rx="1"/>--}}
{{--                                                                        <path d="M17.875,14.086 C17.875,14.8206703 17.7293348,15.4381642 17.438,15.9385 C17.1466652,16.4388358 16.7603357,16.8409985 16.279,17.145 C15.7976643,17.4490015 15.2498364,17.6674993 14.6355,17.8005 C14.0211636,17.9335007 13.3910032,18 12.745,18 L7,18 L7,4.548 L12.745,4.548 C13.2643359,4.548 13.7963306,4.60183279 14.341,4.7095 C14.8856694,4.8171672 15.3796644,5.00083204 15.823,5.2605 C16.2663356,5.52016796 16.6273319,5.87166445 16.906,6.315 C17.1846681,6.75833555 17.324,7.32199658 17.324,8.006 C17.324,8.75333707 17.1213354,9.3708309 16.716,9.8585 C16.3106646,10.3461691 15.77867,10.6976656 15.12,10.913 C15.5000019,11.0143337 15.8578317,11.1314991 16.1935,11.3025 C16.5291683,11.4735009 16.8204988,11.6919987 17.0675,11.958 C17.3145012,12.2240013 17.5108326,12.5343316 17.6565,12.889 C17.8021674,13.2436684 17.875,13.6426645 17.875,14.086 Z M14.189,8.443 C14.189,7.98699772 14.0148351,7.65450105 13.6665,7.4455 C13.3181649,7.23649896 12.8020034,7.132 12.118,7.132 L10.522,7.132 L10.522,9.906 L12.27,9.906 C12.878003,9.906 13.3498317,9.78250124 13.6855,9.5355 C14.0211683,9.28849877 14.189,8.92433574 14.189,8.443 Z M14.626,13.782 C14.626,13.2246639 14.4170021,12.8383344 13.999,12.623 C13.5809979,12.4076656 13.0236701,12.3 12.327,12.3 L10.522,12.3 L10.522,15.378 L12.346,15.378 C12.5993346,15.378 12.8621653,15.3558336 13.1345,15.3115 C13.4068347,15.2671664 13.6538322,15.1880006 13.8755,15.074 C14.0971678,14.9599994 14.277666,14.798501 14.417,14.5895 C14.556334,14.380499 14.626,14.111335 14.626,13.782 Z" fill="#000000"/>--}}
{{--                                                                    </g>--}}
{{--																</svg>--}}
{{--                                                            <!--end::Svg Icon-->--}}
{{--															</span>--}}
{{--                        </div>--}}
{{--                        <div class="d-flex flex-column">--}}

{{--                            <div class="text-dark-75">--}}
{{--                                <div style="font-size: 2.6em;">{{$balance->available_balance}} BTC</div>--}}
{{--                                @if($balance->pending_received_balance > 0)--}}
{{--                                    <h6 class="text-right"> +{{$balance->pending_received_balance}} BTC <span class="text-warning">(pending)</span></h6>--}}
{{--                                @endif--}}
{{--                                <p style="color: gray;font-size: 1.5em;">Wallet Balance</p>--}}
{{--                            </div>--}}


{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

        </div>
        <div class="col-lg-4 col-md-6">
            <!--begin::Stats Widget 2-->
            <div class="card card-custom bgi-no-repeat gutter-b card-stretch"
                 style="background-position: right top; background-size: 30% auto; background-image: url(dashboard/media/svg/shapes/abstract-2.svg);background-repeat: no-repeat">
                <!--begin::Body-->
                <div class="card-body">
                    <a href="#" class="card-title font-weight-bold text-muted text-hover-primary font-size-h5 pb-2">Your GCBuying Bitcoin Address</a>
                    <hr>
                    <div class="d-flex justify-content-center">
                        <div id="qrcode"></div>
                    </div>

                    <hr>
                    <div class="input-group">
                            <input class="form-control" type="text" value="{{$balance->address}}" readonly>
                    </div>
                </div>
                <!--end::Body-->
            </div>
            <!--end::Stats Widget 2-->
        </div>
    </div>
    <!--end::Row-->

    <div class="row">
        <div class="col-12">
            <!--begin::Advance Table Widget 5-->
            <div class="card card-custom gutter-b pb-5">
                <!--begin::Header-->
                <div class="card-header border-0 py-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label font-weight-bolder text-dark">Received History</span>
                        <span class="text-muted mt-3 font-weight-bold font-size-sm">Showing Latest History</span>
                    </h3>
{{--                    <div class="card-toolbar">--}}
{{--                        <a href="{{route('sell.bitcoin')}}" class="btn btn-info font-weight-bolder font-size-sm mr-3">Trade Bitcoin</a>--}}
{{--                        <a href="{{route('sell')}}" class="btn btn-info font-weight-bolder font-size-sm">Sell Gift Card</a>--}}
{{--                    </div>--}}
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body py-0">
                    <!--begin::Table-->
                    <div class="table-responsive">
                        <table class="table table-head-custom table-vertical-center" id="kt_advance_table_widget_2">
                            <thead>
                            <tr class="text-uppercase">

                                <th class="pl-0" style="min-width: 100px">Transaction ID</th>
                                <th style="min-width: 120px">Amount</th>
                                <th style="min-width: 150px">
                                    Received From
                                </th>
                                <th style="min-width: 150px">Confirmations</th>
                                <th>Time (UTC)</th>
                            </tr>
                            </thead>
                            <tbody>



                            @foreach($received as $item)
                            <tr>


                                <td class="pl-0">
                                    <a href="https://www.blockchain.com/btc/tx/{{$item->txid}}"
                                       class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg">{{$item->txid}}</a>
                                </td>
                                <td>
                                    <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$item->amounts_received[0]->amount}}</span>

                                </td>
                                <td>
																	<span
                                                                        class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$item->senders[0]}}</span>
                                </td>
                                <td>
																	<span
                                                                        class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$item->confirmations}}</span>

                                </td>
                                <td>
																	<span
                                                                        class="text-dark-75 font-weight-bolder d-block font-size-lg">{{Carbon\Carbon::createFromTimestampUTC($item->time)}}</span>

                                </td>


                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                    </div>
                    <!--end::Table-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Advance Table Widget 5-->
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <!--begin::Advance Table Widget 5-->
            <div class="card card-custom gutter-b pb-5">
                <!--begin::Header-->
                <div class="card-header border-0 py-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label font-weight-bolder text-dark">Sent History</span>
                        <span class="text-muted mt-3 font-weight-bold font-size-sm">Showing Latest History</span>
                    </h3>
                    {{--                    <div class="card-toolbar">--}}
                    {{--                        <a href="{{route('sell.bitcoin')}}" class="btn btn-info font-weight-bolder font-size-sm mr-3">Trade Bitcoin</a>--}}
                    {{--                        <a href="{{route('sell')}}" class="btn btn-info font-weight-bolder font-size-sm">Sell Gift Card</a>--}}
                    {{--                    </div>--}}
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body py-0">
                    <!--begin::Table-->
                    <div class="table-responsive">
                        <table class="table table-head-custom table-vertical-center" id="kt_advance_table_widget_2">
                            <thead>
                            <tr class="text-uppercase">

                                <th class="pl-0" style="min-width: 100px">Transaction ID</th>
                                <th style="min-width: 120px">Amount (BTC)</th>
                                <th style="min-width: 150px">
                                    Sent to
                                </th>
                                <th>Confirmations</th>
                                <th>Time (UTC)</th>
                            </tr>
                            </thead>
                            <tbody>



                            @foreach($sent as $item)
                                <tr>


                                    <td class="pl-0">
                                        <a href="https://www.blockchain.com/btc/tx/{{$item->txid}}"
                                           class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg">{{$item->txid}}</a>
                                    </td>
                                    <td>
                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$item->amounts_sent[0]->amount}}</span>

                                    </td>
                                    <td>
																	<span
                                                                        class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$item->amounts_sent[0]->recipient}}</span>
                                    </td>
                                    <td>
																	<span
                                                                        class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$item->confirmations}}</span>

                                    </td>
                                    <td>
																	<span
                                                                        class="text-dark-75 font-weight-bolder d-block font-size-lg">{{Carbon\Carbon::createFromTimestampUTC($item->time)}}</span>

                                    </td>


                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!--end::Table-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Advance Table Widget 5-->
        </div>
    </div>
    <!-- Modal-->
    <div class="modal fade" id="exampleModalCenter" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-body">

                    <div class="card card-custom bgi-no-repeat gutter-b card-stretch"
                         style="background-position: right top; background-size: 30% auto; background-image: url(dashboard/media/svg/shapes/abstract-1.svg)">
                        <!--begin::Body-->
                        <div class="card-body">
                            <a href="#" class="card-title font-weight-bold text-muted text-hover-primary font-size-h5 pb-2 d-flex justify-content-center align-items-center">Receiving Address</a>
                            <hr>
                            <div class="d-flex justify-content-center align-items-center">
                                <div id="qrcode2"></div>
                            </div>

                            <hr>
                            <div class="input-group">
                                <input class="form-control" type="text" value="{{$balance->address}}" readonly>

                            </div>
                        </div>
                        <!--end::Body-->
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <script src="{{asset('backend/js/core/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/qrcode.js')}}" type="text/javascript"></script>
    <script>
        new QRCode(document.getElementById("qrcode"), {
            text: "bitcoin:{{auth()->user()->wallet->btc_address}}",
            width: 150,
            height: 150,
        })
    </script>
@endsection
