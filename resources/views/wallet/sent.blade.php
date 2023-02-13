@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">

        <div class="col-md-6">
            <div class="card card-custom bg-white gutter-b">

                <div class="card-header border-0 pt-5">
                    <h3 class="card-title align-items-baseline">
                        <span class="svg-icon svg-icon-warning svg-icon-6x mr-3"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo7\dist/../src/media/svg/icons\Shopping\Bitcoin.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24"/>
                                                            <rect fill="#000000" opacity="0.3" x="11" y="2" width="2" height="5" rx="1"/>
                                                            <rect fill="#000000" opacity="0.3" x="11" y="16" width="2" height="5" rx="1"/>
                                                            <path d="M17.875,14.086 C17.875,14.8206703 17.7293348,15.4381642 17.438,15.9385 C17.1466652,16.4388358 16.7603357,16.8409985 16.279,17.145 C15.7976643,17.4490015 15.2498364,17.6674993 14.6355,17.8005 C14.0211636,17.9335007 13.3910032,18 12.745,18 L7,18 L7,4.548 L12.745,4.548 C13.2643359,4.548 13.7963306,4.60183279 14.341,4.7095 C14.8856694,4.8171672 15.3796644,5.00083204 15.823,5.2605 C16.2663356,5.52016796 16.6273319,5.87166445 16.906,6.315 C17.1846681,6.75833555 17.324,7.32199658 17.324,8.006 C17.324,8.75333707 17.1213354,9.3708309 16.716,9.8585 C16.3106646,10.3461691 15.77867,10.6976656 15.12,10.913 C15.5000019,11.0143337 15.8578317,11.1314991 16.1935,11.3025 C16.5291683,11.4735009 16.8204988,11.6919987 17.0675,11.958 C17.3145012,12.2240013 17.5108326,12.5343316 17.6565,12.889 C17.8021674,13.2436684 17.875,13.6426645 17.875,14.086 Z M14.189,8.443 C14.189,7.98699772 14.0148351,7.65450105 13.6665,7.4455 C13.3181649,7.23649896 12.8020034,7.132 12.118,7.132 L10.522,7.132 L10.522,9.906 L12.27,9.906 C12.878003,9.906 13.3498317,9.78250124 13.6855,9.5355 C14.0211683,9.28849877 14.189,8.92433574 14.189,8.443 Z M14.626,13.782 C14.626,13.2246639 14.4170021,12.8383344 13.999,12.623 C13.5809979,12.4076656 13.0236701,12.3 12.327,12.3 L10.522,12.3 L10.522,15.378 L12.346,15.378 C12.5993346,15.378 12.8621653,15.3558336 13.1345,15.3115 C13.4068347,15.2671664 13.6538322,15.1880006 13.8755,15.074 C14.0971678,14.9599994 14.277666,14.798501 14.417,14.5895 C14.556334,14.380499 14.626,14.111335 14.626,13.782 Z" fill="#000000"/>
                                                        </g>
                                                    </svg><!--end::Svg Icon--></span>
                        <span class="card-label font-weight-bold font-size-h2 text-dark-75">Send Bitcoin</span>
                    </h3>
                </div>


                <form class="form-horizontal" method="post" action="#">


                <div class="card-body mt-4">

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

                        @csrf
{{--                        <div class="row">--}}
{{--                            <label class="col-md-3 col-form-label">Total Amount in USD ($)</label>--}}
{{--                            <div class="col-md-9">--}}
{{--                                <div class="form-group">--}}
{{--                                    <input id="sell_amount" value="0.00" type="text" name="total_amount" class="form-control"required="true">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                            <div class="form-group row">
                                <label class="col-form-label col-lg-3 col-sm-12">Destination Address</label>
                                <div class="col-md-9 col-sm-12">
                                    <div class="input-group">
                                        <input id="address" name="address" type="text" class="form-control" value="{{old('address')}}" required="true"/>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-md-3 col-form-label">Amount to Send <small>(BTC value)</small></label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input id="btc_amount" name="amount" value="{{old('amount')}}" type="text" class="form-control" required="true">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label">Estimate Fee</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input id="fee" value="0.00" type="text" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label">Total Amount</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input id="total" value="0.00" type="text" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>




                            <div class="row mt-4">
                                <input type="text"  id="sell_rate" value="0" hidden>
                                <button id="submit" style="display: none" type="submit" class="btn btn-primary font-weight-bold">Sent Bitcoin</button>
                            </div>

                </div>

                </form>
            </div>
        </div>
    </div>

<script>
    window.addEventListener('keydown',function(e){if(e.keyIdentifier=='U+000A'||e.keyIdentifier=='Enter'||e.keyCode==13){if(e.target.nodeName=='INPUT'&&e.target.type=='text'){e.preventDefault();return false;}}},true);
    const balance = {{$balance->available_balance}};
    const from_address = '{{$balance->address}}';
    console.log(from_address);
    const address = document.getElementById("address");
    const btc_fee = document.getElementById("fee");
    const btc_amount = document.getElementById("btc_amount");
    const total = document.getElementById("total");
    const button = document.getElementById("submit");
    let fee = 0;


        btc_amount.addEventListener('change', updateValue);
        function updateValue(e) {

            const data = { amount: parseFloat(e.target.value) , address: address.value , from_address: from_address};


            fetch('/api/get_network_fee', {
                method: 'POST', // or 'PUT'
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(data),
            })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    fee = (parseFloat(data.data.estimated_network_fee) + parseFloat(data.data.blockio_fee));
                    btc_fee.value = fee;
                    total.value = parseFloat(btc_amount.value) + fee ;
                    if(data.status === 'fail'){
                        alert(data.data.error_message);
                        btc_fee.value = 0;
                        total.value = 0;
                        btc_amount.value = 0;
                        button.style.display = "none";
                    }
                    if(data.status === 'success'){
                        button.style.display = "block";
                    }
                })
                .catch((error) => {
                    console.error('Error:', error);
                });



            // get_amount.value = parseFloat(e.target.value) * rate;
            // btc_amount.value = parseFloat(e.target.value) / btc_rate;
        }




</script>
@endsection
