@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">

        <div class="col-md-6">
            <div class="card card-custom bg-white gutter-b">
                <form class="form-horizontal" enctype="multipart/form-data" method="post" action="{{route('withdraw.now')}}">
                    <div class="card-header border-0 pt-5">
                        <h3 class="card-title align-items-baseline">
                            <span class="svg-icon svg-icon-success svg-icon-6x mr-3"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo7\dist/../src/media/svg/icons\Shopping\Money.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24"/>
                                                            <path d="M2,6 L21,6 C21.5522847,6 22,6.44771525 22,7 L22,17 C22,17.5522847 21.5522847,18 21,18 L2,18 C1.44771525,18 1,17.5522847 1,17 L1,7 C1,6.44771525 1.44771525,6 2,6 Z M11.5,16 C13.709139,16 15.5,14.209139 15.5,12 C15.5,9.790861 13.709139,8 11.5,8 C9.290861,8 7.5,9.790861 7.5,12 C7.5,14.209139 9.290861,16 11.5,16 Z" fill="#000000" opacity="0.3" transform="translate(11.500000, 12.000000) rotate(-345.000000) translate(-11.500000, -12.000000) "/>
                                                            <path d="M2,6 L21,6 C21.5522847,6 22,6.44771525 22,7 L22,17 C22,17.5522847 21.5522847,18 21,18 L2,18 C1.44771525,18 1,17.5522847 1,17 L1,7 C1,6.44771525 1.44771525,6 2,6 Z M11.5,16 C13.709139,16 15.5,14.209139 15.5,12 C15.5,9.790861 13.709139,8 11.5,8 C9.290861,8 7.5,9.790861 7.5,12 C7.5,14.209139 9.290861,16 11.5,16 Z M11.5,14 C12.6045695,14 13.5,13.1045695 13.5,12 C13.5,10.8954305 12.6045695,10 11.5,10 C10.3954305,10 9.5,10.8954305 9.5,12 C9.5,13.1045695 10.3954305,14 11.5,14 Z" fill="#000000"/>
                                                        </g>
                                                    </svg><!--end::Svg Icon--></span>
                            <span class="card-label font-weight-bold font-size-h2 text-dark-75">Withdraw Your Balance</span>
                        </h3>
                    </div>
                    <div class="card-body">
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

                            @if (\Session::has('error'))

                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>{!! \Session::get('error') !!}</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                        @csrf

                        <div class="row">
                            <label class="col-md-3 col-form-label">Total Amount to Withdraw (N)</label>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <input id="sell_amount" value="{{old('amount') ?? '0.00'}}" type="text" name="amount" class="form-control" required="true">
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
                            <br>
                            <div>
                                <button type="submit" class="btn btn-primary font-weight-bold">Withdraw Now</button>
                            </div>

                    </div>



                </form>
            </div>
        </div>
    </div>

@endsection
