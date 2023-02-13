@extends('auth.app')
@section('content')




<div class="login-19">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="login-inner-form">
                    <div class="logo-2">
                        <h4>GC Buying</h4>
                    </div>
                    <div class="details">
                        @if(Session::has('message'))
                            Session::get('message')
                        @endif
                        <h3>ADMIN LOGIN</h3>
                        <form method="POST" action="{{ route('admin.login') }}">
                            @csrf
                            <div class="form-group form-box">
                                <input type="email" name="email" class="input-text" placeholder="Email Address" value="{{ old('email') }}">
                                <i class="flaticon-mail-2"></i>
                            </div>
                            @error('email')
                                        <small>{{ $message }}</small>
                            @enderror
                            <div class="form-group form-box">
                                <input type="password" name="password" class="input-text" placeholder="Password">
                                <i class="flaticon-password"></i>
                            </div>
                            @error('password')
                                    
                                        <small>{{ $message }}</small>
                                    
                            @enderror
                            <div class="checkbox clearfix">
                                <div class="form-check checkbox-theme">
                                    <input class="form-check-input" type="checkbox" value="" name="remember" id="rememberMe">
                                    <label class="form-check-label" for="rememberMe">
                                        Remember me
                                    </label>
                                </div>
                                <a href="{{ route('admin.password.request') }}">Forgot Password</a>
                            </div>
                            <div class="form-group mb-0">
                                <button type="submit" class="btn-md btn-theme btn-block">Login</button>
                            </div>
                            
                            
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>







<!--<div class="container">-->
<!--    <div class="row justify-content-center">-->
<!--        <div class="col-md-8">-->
<!--            <div class="card">-->
<!--                <div style="background: #1400c6; !important" class="card-header card-header-primary text-center"><h2>Admin Login</h2></div>-->

<!--                <div class="card-body">-->
<!--                    <form method="POST" action="{{ route('admin.login') }}" aria-label="{{ __('Admin Login') }}">-->
<!--                        @csrf-->

<!--                        <div class="form-group row">-->
<!--                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>-->

<!--                            <div class="col-md-6">-->
<!--                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}"-->
<!--                                    required autofocus> @if ($errors->has('email'))-->
<!--                                <span class="invalid-feedback" role="alert">-->
<!--                                        <strong>{{ $errors->first('email') }}</strong>-->
<!--                                    </span> @endif-->
<!--                            </div>-->
<!--                        </div>-->

<!--                        <div class="form-group row">-->
<!--                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>-->

<!--                            <div class="col-md-6">-->
<!--                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"-->
<!--                                    required> @if ($errors->has('password'))-->
<!--                                <span class="invalid-feedback" role="alert">-->
<!--                                        <strong>{{ $errors->first('password') }}</strong>-->
<!--                                    </span> @endif-->
<!--                            </div>-->
<!--                        </div>-->

<!--                        <div class="form-group row">-->
<!--                            <div class="col-md-6 offset-md-4">-->


<!--                                <div class="form-check">-->

<!--                                    <label class="form-check-label" for="remember">-->
<!--                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>-->
<!--                                        <span class="form-check-sign">-->
<!--                                                 <span class="check"></span>-->
<!--                                            </span>-->
<!--                                        {{ __('Remember Me') }}-->
<!--                                    </label>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->

<!--                        <div class="form-group row mb-0">-->
<!--                            <div class="col-md-8 offset-md-4">-->
<!--                                <button type="submit" class="btn btn-primary">-->
<!--                                    {{ __('Login') }}-->
<!--                                </button>-->

<!--                                <a class="btn btn-link" href="{{ route('admin.password.request') }}">-->
<!--                                    {{ __('Forgot Your Password?') }}-->
<!--                                </a>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </form>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
@endsection
