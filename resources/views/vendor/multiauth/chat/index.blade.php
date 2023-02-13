@extends('multiauth::layouts.app')
    <script src="{{asset('js/app.js')}}" defer></script>
@section('content')

    <div id="app" class="row justify-content-center align-items-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header card-header-icon card-header-rose">
                    <div class="card-icon">
                        <i class="material-icons">chat</i>
                    </div>
                </div>
                <div class="card-body">
                    <h3 class="card-title text-center"><strong>Chat</strong></h3>
                    <hr class="border-danger"/>
                    <chat :user="{{$user}}" :admin="true"></chat>
                </div>
            </div>
        </div>
    </div>



    <script src="{{ asset('backend/js/core/jquery.min.js') }}" type="text/javascript"></script>




@endsection
