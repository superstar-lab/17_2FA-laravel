@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">

        <div class="col-md-6">

            <!--begin::Forms Widget 7-->
            <div class="card card-custom bg-white gutter-b">
                <!--begin::Header-->
                <div class="card-header border-0 pt-5">
                    <h3 class="card-title align-items-baseline flex">
                        <span class="svg-icon svg-icon-primary svg-icon-6x mr-3"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo7\dist/../src/media/svg/icons\Shopping\Gift.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24"/>
                                                            <path d="M4,6 L20,6 C20.5522847,6 21,6.44771525 21,7 L21,8 C21,8.55228475 20.5522847,9 20,9 L4,9 C3.44771525,9 3,8.55228475 3,8 L3,7 C3,6.44771525 3.44771525,6 4,6 Z M5,11 L10,11 C10.5522847,11 11,11.4477153 11,12 L11,19 C11,19.5522847 10.5522847,20 10,20 L5,20 C4.44771525,20 4,19.5522847 4,19 L4,12 C4,11.4477153 4.44771525,11 5,11 Z M14,11 L19,11 C19.5522847,11 20,11.4477153 20,12 L20,19 C20,19.5522847 19.5522847,20 19,20 L14,20 C13.4477153,20 13,19.5522847 13,19 L13,12 C13,11.4477153 13.4477153,11 14,11 Z" fill="#000000"/>
                                                            <path d="M14.4452998,2.16794971 C14.9048285,1.86159725 15.5256978,1.98577112 15.8320503,2.4452998 C16.1384028,2.90482849 16.0142289,3.52569784 15.5547002,3.83205029 L12,6.20185043 L8.4452998,3.83205029 C7.98577112,3.52569784 7.86159725,2.90482849 8.16794971,2.4452998 C8.47430216,1.98577112 9.09517151,1.86159725 9.5547002,2.16794971 L12,3.79814957 L14.4452998,2.16794971 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                                        </g>
                                                    </svg><!--end::Svg Icon--></span>
                        <span class="card-label font-weight-bold font-size-h2 text-dark-75">Recharge Your Phone</span>
                    </h3>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body pt-1">
                    <div class="tab-content mt-5" id="myTabContent">
                        <!--begin::Tap pane-->

                        <!--end::Tap pane-->
                        <!--begin::Tap pane-->
                        <div class="tab-pane fade show active">
                            <!--begin::Form-->
                            <form class="form" id="kt_form_1" enctype="multipart/form-data" method="post" action="{{route('recharge.store')}}">
                                @csrf

                                <div class="row">
                                    <div class="col">
                                        @if ($errors->any())
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        @endif

                                        @if (\Session::has('success'))

                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                <strong>{!! \Session::get('success') !!}</strong>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-md-3 col-form-label">Select Your Operator</label>
                                    <div class="col-md-9">
                                        <select id="cardSelection" class="selectpicker btn btn-secondary" name="operator_id" data-live-search="true" data-style="select-with-transition" title="Choose Operator" data-size="7" required="true">
                                            <option selected> Select Your Operator</option>

                                            @foreach($operators as $operator)
                                                <option value="{{$operator->id}}" data-rate="{{$operator->rate}}">{{$operator->name}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 10px;">
                                    <label class="col-md-3 col-form-label">Phone Number</label>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <input id="phone" value="{{old('phone') ?? ''}}" type="text" name="phone" class="form-control" required="true">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-3 col-form-label">Amount in USD</label>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <input id="usd_amount_base" type="text" class="form-control" required="true">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-3 col-form-label">Amount in USD (With VAT)</label>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <input id="usd_amount" value="{{old('usd_amount')?? '0.00'}}" type="text" name="amount_usd" class="form-control" required="true">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row" style="margin-top: 10px;">
                                    <label class="col-md-3 col-form-label">Total Amount (N)</label>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <input id="naira_amount" value="{{old('naira_amount') ?? '0.00'}}" type="text" name="amount_naira" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <label class="col-md-3 col-form-label">Amount in BTC</label>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <input id="btc_amount" value="{{old('btc_amount')?? '0.00'}}" type="text" name="amount_btc" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-3 col-sm-12">Please Pay to</label>
                                    <div class="col-md-9 col-sm-12">
                                        <div class="input-group">
                                            <input type="text" class="form-control" value="{{$bitcoin->address}}" readonly/>
                                        
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-3 col-form-label">Extra Information <small>(Optional)</small></label>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <textarea class="form-control" name="note" rows="4">{{old('note')}}</textarea>
                                        </div>
                                    </div>
                                </div>


                                <div class="row mt-4">
                                    <button type="submit" class="btn btn-primary font-weight-bold">Recharge Now</button>
                                </div>
                            </form>
                            <!--end::Form-->
                        </div>
                        <!--end::Tap pane-->
                    </div>
                </div>
                <!--end::Body-->
            </div>
            <!--end::Forms Widget 7-->
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <!--begin::Advance Table Widget 5-->
            <div class="card card-custom gutter-b">
                <!--begin::Header-->
                <div class="card-header border-0 py-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label font-weight-bolder text-dark">Recent Recharges</span>
                        <span class="text-muted mt-3 font-weight-bold font-size-sm">Showing Recent 5 Recharges</span>
                    </h3>
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
                                <th style="min-width: 120px">Operator Name</th>
                                <th style="min-width: 150px">
                                    Phone Number
                                </th>
                                <th style="min-width: 150px">Naira Amount</th>
                                <th>BTC Amount</th>
                                <th>USD Amount</th>
                                <th style="min-width: 130px">status</th>
                                <th>Created at</th>
                                <th>Updated at</th>
                                <th class="pr-0 text-right" style="min-width: 160px">action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($recharges as $recharge)
                                <tr>

                                    <td class="pl-0">
                                        <a href="#"
                                           class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg">{{$recharge->txid}}</a>
                                    </td>
                                    <td>
                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$recharge->operator->name ?? 'Removed'}}</span>

                                    </td>
                                    <td>
																	<span
                                                                        class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$recharge->phone}}</span>
                                    </td>
                                    <td>
																	<span
                                                                        class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$recharge->amount_naira}}</span>

                                    </td>
                                    <td>
																	<span
                                                                        class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$recharge->amount_btc}}</span>

                                    </td>
                                    <td>
																	<span
                                                                        class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$recharge->amount_usd}}</span>

                                    </td>
                                    <td>
                                        <span class="label label-lg label-light-primary label-inline">{{$recharge->status}}</span>
                                    </td>
                                    
                            
                            
                                    <td><span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$recharge->created_at}}
                                                                        </span></td>
                                    <td><span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$recharge->updated_at}}
                                                                        </span></td>
                                    
                                    <td class="pr-0 text-right">
                                        <a href="{{route('recharge.show',$recharge->id)}}" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																		<span class="svg-icon svg-icon-md svg-icon-primary">
																			<!--begin::Svg Icon | path:dashboard/media/svg/icons/General/Settings-1.svg-->
																			<svg xmlns="http://www.w3.org/2000/svg"
                                                                                 xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                                                 viewBox="0 0 24 24" version="1.1">
																				<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																					<rect x="0" y="0" width="24" height="24" />
																					<path
                                                                                        d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z"
                                                                                        fill="#000000" />
																					<path
                                                                                        d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z"
                                                                                        fill="#000000" opacity="0.3" />
																				</g>
																			</svg>
                                                                            <!--end::Svg Icon-->
																		</span>
                                        </a>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!--end::Table-->
                </div>
                <!--end::Body-->
                <div class="card-footer">
                    <div class="d-flex justify-content-center">{{$recharges->links()}}</div>
                </div>
            </div>
            <!--end::Advance Table Widget 5-->
        </div>
    </div>

<script>
    let selection = document.getElementById("cardSelection");
    let btc_rate = 0;
    fetch('https://blockchain.info/ticker')
        .then(
            function(response) {
                if (response.status !== 200) {
                    console.log('Looks like there was a problem. Status Code: ' +
                        response.status);
                    return;
                }

                // Examine the text in the response
                response.json().then(function(data) {
                    btc_rate = data.USD.last;
                });
            }
        )
        .catch(function(err) {
            console.log('Fetch Error :-S', err);
        });

    selection.onchange = function(event){
        let rate = event.target.options[event.target.selectedIndex].dataset.rate;
        const usd_amount_base = document.getElementById("usd_amount_base");
        let vat = (usd_amount_base.value) * 0.15;

        const naira_amount = document.getElementById("naira_amount");
        const btc_amount = document.getElementById("btc_amount");
        const usd_amount = document.getElementById("usd_amount");
        usd_amount.value = parseFloat(usd_amount_base.value) + parseFloat(vat);
        naira_amount.value = parseFloat(usd_amount.value) * rate;
        btc_amount.value = parseFloat(usd_amount.value) / btc_rate;

        usd_amount_base.addEventListener('change', updateValue);
        
        function updateValue(e) {
            
            vat = (e.target.value) * 0.15;
            usd_amount.value = parseFloat(e.target.value) + parseFloat(vat);
            naira_amount.value = parseFloat(usd_amount.value) * rate;
            btc_amount.value = parseFloat(usd_amount.value) / btc_rate;
        }
    };



</script>
@endsection
