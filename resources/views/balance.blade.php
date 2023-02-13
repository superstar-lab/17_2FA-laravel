@extends('layouts.app')

@section('content')


            <div class="row justify-content-center">
                <div class="col-lg-8 cards">
                    <div class="card card-pricing card-raised">
                        <div class="card-body">
                            <h2 class="card-category">Account Balance</h2>
                            <div class="card-icon icon-rose">
                                <i class="material-icons">account_balance_wallet</i>
                            </div>
                            <h3 class="card-title"> <strong>N {{$balance}} </strong></h3>

                            <a href="{{route('withdraw')}}" class="btn btn-rose btn-round mt-4">Withdraw Now</a>
                        </div>
                    </div>
                </div>
            </div>


@endsection
