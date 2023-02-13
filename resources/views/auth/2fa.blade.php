@extends('layouts.auth.app')

@section('title','Two Factor Authentication')

@section('content')

    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="auth-wrapper auth-v1 px-2">
                    <div class="auth-inner py-2">
                        <!-- Login v1 -->
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="javascript:void(0);" class="brand-logo">
                                    <h2 class="brand-text text-primary ml-1">Gcbuying</h2>
                                </a>

                                <h4 class="card-title mb-1">Two Factor Authentication! 😶</h4>

                                @if(session()->has('success'))
                                    <div class="alert alert-success alert-body">
                                        {{session()->get('success')}}
                                    </div>
                                @endif
                                <p class="card-text mb-2">Insert the two factor code from your Email</p>

                                <form class="auth-login-form mt-2" action="{{route('wallet.2fa')}}" method="POST">
                                    @csrf

                                    <div class="form-group">
                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input type="number" class="form-control form-control-merge @error('code') is-invalid @enderror" id="login-password" name="code" tabindex="2" placeholder="XXXXXX" aria-describedby="login-password" />

                                        </div>
                                        @error('code')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block" tabindex="4">Submit</button>
                                </form>

                                <p class="text-center mt-2">
                                    <span>Didn't received code?</span>
                                    <a onclick="event.preventDefault();
                                                     document.getElementById('new_2fa').submit();" href="{{route('wallet.2fa.new')}}">
                                        <span>Request a new one</span>
                                    </a>
                                    <form style="display:none" id="new_2fa" method="post" action="{{route('wallet.2fa.new')}}">
                                        @csrf
                                    </form>

                                </p>
                            </div>
                        </div>
                        <!-- /Login v1 -->
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection

@push('js')
    <script src="{{asset('vuexy/js/scripts/pages/page-auth-login.js')}}"></script>
@endpush
