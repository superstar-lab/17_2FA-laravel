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
                        <span class="card-label font-weight-bold font-size-h2 text-dark-75">Sell Your Card</span>
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
                            <form class="form" id="kt_form_1" enctype="multipart/form-data" method="post" action="{{route('sell.now')}}">
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
                                    <label class="col-md-3 col-form-label">Select Your Card</label>
                                    <div class="col-md-9">
                                        <select id="cardSelection" class="selectpicker btn btn-secondary" name="card" data-style="select-with-transition" data-live-search="true" title="Choose Card" data-size="7" required="true">
                                            <option selected> Select Your card</option>

                                            @foreach($cards as $card)
                                                <option value="{{$card->id}}" data-rate="{{$card->rate}}">{{$card->name}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 10px;">
                                    <label class="col-md-3 col-form-label">Total Amount </label>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <input id="sell_amount" value="{{old('total_amount') ?? '0.00'}}" type="text" name="total_amount" class="form-control" required="true">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-3 col-form-label">You Will Get (N)</label>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <input id="get_amount" value="{{old('sell_amount')?? '0.00'}}" type="text" name="sell_amount" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-md-3 col-form-label">Upload Your Card Image</label>
                                    <div class="col-md-9 fileinput fileinput-new text-center" data-provides="fileinput">
                                        <div></div>
                                        <div class="custom-file">
                                            <input type="file" name="images[]" class="custom-file-input" multiple id="customFile" required="true"/>
                                            <label class="custom-file-label" for="customFile">Choose files</label>
                                        </div>
                                    </div>
                                    <p>*You can upload multiple images.</p>
                                </div>

                                <div class="row">
                                    <label class="col-md-3 col-form-label">Term <small>(Optional)</small></label>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <textarea class="form-control" name="note" rows="4" placeholder="NOTE: If you are trading an ecode, kindly type out the code in the TERM section. Ensure all necessary fields are filled correctly before proceeding ">{{old('note')}}</textarea>
                                        </div>
                                    </div>
                                </div>



                                <div class="row">
                                    <label class="col-md-3"></label>
                                    <div class="col-md-9">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" name="terms" type="checkbox" required="true"> I accept Terms and Conditions
                                                <span class="form-check-sign">
                                          <span class="check"></span>
                                        </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <button type="submit" class="btn btn-primary font-weight-bold">Sell Gift Card</button>
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
<script>
    let selection = document.getElementById("cardSelection");

    selection.onchange = function(event){
        let rate = event.target.options[event.target.selectedIndex].dataset.rate;

        const sell_amount = document.getElementById("sell_amount");
        const get_amount = document.getElementById("get_amount");
        get_amount.value = parseFloat(sell_amount.value) * rate;

        sell_amount.addEventListener('change', updateValue);
        console.log("rate: " + rate);
        function updateValue(e) {
            get_amount.value = parseFloat(e.target.value) * rate;
        }
    };



</script>
@endsection
