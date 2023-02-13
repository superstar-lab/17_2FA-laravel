@extends('auth.app')
@section('content')




<!-- Login 19 start -->
<div class="login-19">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="login-inner-form">
                    <div class="logo-2">
                        <h4>GC Buying</h4>
                    </div>
                    <div class="details">
                        <h3>Recover your password</h3>
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('admin.password.email') }}">
                        @csrf
                            <div class="form-group form-box">
                                <input type="email" name="email" class="input-text" placeholder="Email Address" value="{{ old('email') }}">
                                <i class="flaticon-mail-2"></i>
                            </div>
                            
                                <button type="submit" class="btn-md btn-theme btn-block">Send Me Email</button>
                            
                            <div class="extra-login">
                                <span>Or Login</span>
                            </div>
                            
                        </form>
                        <button type="submit" class="btn-md btn-theme btn-block"><a href="{{route('admin.login')}}">Login Here</a></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Login 19 end -->





















<!--<div class="container">-->
<!--    <div class="row justify-content-center">-->
<!--        <div class="col-md-8">-->
<!--            <div class="card">-->
<!--                <div class="card-header">Reset {{ ucfirst(config('multiauth.prefix')) }} Password</div>-->

<!--                <div class="card-body">-->
<!--                    @if (session('status'))-->
<!--                    <div class="alert alert-success" role="alert">-->
<!--                        {{ session('status') }}-->
<!--                    </div>-->
<!--                    @endif-->

<!--                    <form method="POST" action="{{ route('admin.password.email') }}" aria-label="{{ __('Reset Admin Password') }}">-->
<!--                        @csrf-->

<!--                        <div class="form-group row">-->
<!--                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>-->

<!--                            <div class="col-md-6">-->
<!--                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}"-->
<!--                                    required> @if ($errors->has('email'))-->
<!--                                <span class="invalid-feedback" role="alert">-->
<!--                                        <strong>{{ $errors->first('email') }}</strong>-->
<!--                                    </span> @endif-->
<!--                            </div>-->
<!--                        </div>-->

<!--                        <div class="form-group row mb-0">-->
<!--                            <div class="col-md-6 offset-md-4">-->
<!--                                <button type="submit" class="btn btn-primary">-->
<!--                                    {{ __('Send Password Reset Link') }}-->
<!--                                </button>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </form>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
@endsection
