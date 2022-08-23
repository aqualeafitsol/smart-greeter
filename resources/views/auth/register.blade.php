@extends('layouts.app')

@section('content')
@include('flashmessage.flash-message')
<section class="main-background login-create-bg-lft-rgt position-relative min-100vh">
    <span class="lb-img"><img class="img-block" src="{{url('image/lb-img.svg')}}" alt=""></span>
    <div class="log-create-main-wrap position-relative">
        <span class="lt-img"><img class="img-block" src="{{url('image/lt-img.svg')}}" alt=""></span>
        <span class="rt-img"><img class="img-block" src="{{url('image/rt-img.svg')}}" alt=""></span>
        <span class="log-in-logo">
            <img class="img-block" src="{{url('image/logo.png')}}" alt="">
        </span>
        <div class="log-create-box">
            <div class="log-create-box-head">
                <h4>Create you account</h4>
                <p>Welcome back! Please enter your details.</p>
            </div>
            <form action="{{route('user.signup')}}" method="post">
                @csrf
                <div class="log-create-box-body">
                    <div class="input-style-wrap">
                        <label>Email</label>
                        <input type="text" placeholder="Enter your email" name="email" class="form-control input-style" value="{{old('email')}}">
                        @if($errors->has('email'))
                            <div class="custom-error">{{ $errors->first('email') }}</div>
                        @endif
                    </div>
                    <div class="input-style-wrap">
                        <label>Name</label>
                        <input type="text" placeholder="Enter your name or business name" name="name"  class="form-control input-style" value="{{old('name')}}">
                        @if($errors->has('name'))
                            <div class="custom-error">{{ $errors->first('name') }}</div>
                        @endif
                    </div>
                    <div class="input-style-wrap">
                        <label>Password</label>
                        <input type="password" placeholder="Password" name="password" class="form-control input-style">
                        @if($errors->has('password'))
                            <div class="custom-error">{{ $errors->first('password') }}</div>
                        @endif
                    </div>
                    <div class="input-style-wrap">
                        <label>Confirm password</label>
                        <input type="password" placeholder="Confirm password" name="password_confirmation" class="form-control input-style">
                    </div>
                    <div class="privacypolicy-chk">
                        <div class="checkbox">
                            <input type="checkbox" id="privacypolicy" name="agree">
                            <label for="privacypolicy">By continuing, you agree to our <a href="{{route('cms','terms-and-conditions')}}">Terms of Use</a> and consent to our <a href="{{route('cms','privacy-policy')}}">Privacy Policy</a></label>
                            @if($errors->has('agree'))
                                <div class="custom-error">{{ $errors->first('agree') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="account-btn-wrap">
                        <button class="account-btn" type="submit">Create Account</button>
                    </div>
                </div>
            </form>
            <div class="log-create-box-ftr">
                <span class="or-text">
                    <p>or register using</p>
                </span>
                <ul class="d-flex social-list justify-content-center">
                    <li>
                        <a href="{{route('google.login')}}">
                            <span class="social-icon-box google"><img class="img-block" src="{{url('image/google.png')}}" alt=""></span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('facebook.login')}}">
                            <span class="social-icon-box facebook"><img class="img-block" src="{{url('image/facebook.png')}}" alt=""></span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('linkedin.login')}}">
                            <span class="social-icon-box linkedin"><img class="img-block" src="{{url('image/linkedin.png')}}" alt=""></span>
                        </a>
                    </li>
                </ul>
                <p class="have-account">Already have an account? <a href="{{route('login')}}">Log in</a></p>
            </div>
        </div>
    </div>
</section>
@endsection
