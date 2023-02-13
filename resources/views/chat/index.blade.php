@extends('layouts.app')

@push('css')
    <link href="https://fonts.googleapis.com/css?family=Material+Icons" rel="stylesheet">
    <script src="{{asset('js/app.js')}}" defer></script>
    <style>
        *{
            font-size: 0.8rem;
        }
    </style>
@endpush

@section('content')

    <div id="app" class="row justify-content-center">

        <div class="col-md-6">

            <!--begin::Forms Widget 7-->
            <div class="card card-custom bg-white gutter-b">

                <!--begin::Body-->
                <div class="card-body pt-1">
                    <v-container fluid>
                        <chat :user="{{auth()->user()}}"></chat>
                    </v-container>
                </div>
                <!--end::Body-->
            </div>
            <!--end::Forms Widget 7-->
        </div>
    </div>
@endsection

@push('js')

@endpush
