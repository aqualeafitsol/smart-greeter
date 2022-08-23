@extends('layouts.admin')

@section('content')
<section class="main-background login-create-bg-lft-rgt position-relative min-100vh">
    
    <span class="lb-img"><img class="img-block" src="{{url('Admin/image/lb-img.svg')}}" alt=""></span>
    <div class="log-create-main-wrap position-relative">
        <span class="lt-img"><img class="img-block" src="{{url('Admin/image/lt-img.svg')}}" alt=""></span>
        <span class="rt-img"><img class="img-block" src="{{url('Admin/image/rt-img.svg')}}" alt=""></span>
        <span class="log-in-logo">
            <img class="img-block" src="{{url('Admin/image/logo.png')}}" alt="">
        </span>
        <div class="log-create-box">
            <div class="log-create-box-head">
                @include('flashmessage.flash-message')
                <h4>Admin Log In</h4>
                <p>Welcome back! Please enter your details.</p>
            </div>
            <form action="{{route('admin.logins')}}" method="post">
                @csrf
                <div class="log-create-box-body">
                    <div class="input-style-wrap">
                        <label>Email</label>
                        <input type="text" placeholder="Enter your email" name="email" class="form-control input-style" value="{{ old('email') }}">
                        @if($errors->has('email'))
                            <div class="custom-error">{{ $errors->first('email') }}</div>
                        @endif
                    </div>
                    <div class="input-style-wrap">
                        <label>Password</label>
                        <input type="password" placeholder="Password" name="password" class="form-control input-style">
                        @if($errors->has('password'))
                            <div class="custom-error">{{ $errors->first('password') }}</div>
                        @endif
                    </div>
                    
                    <div class="forget-pass">
                        {{-- <a href="{{route('forget.password.get')}}">Forgot Password?</a> --}}
                        
                    </div>
                    <div class="account-btn-wrap">
                        <button class="account-btn" type="submit">Log In</button>
                    </div>
                </div>
            </form>
           {{--  <div class="log-create-box-ftr">
                <span class="or-text">
                    <p>or register using</p>
                </span>
                <ul class="d-flex social-list justify-content-center">
                    <li>
                        <a href="{{route('google.login')}}">
                            <span class="social-icon-box google"><img class="img-block" src="{{url('Admin/image/google.png')}}" alt=""></span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('facebook.login')}}">
                            <span class="social-icon-box facebook"><img class="img-block" src="{{url('Admin/image/facebook.png')}}" alt=""></span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('linkedin.login')}}">
                            <span class="social-icon-box linkedin"><img class="img-block" src="{{url('Admin/image/linkedin.png')}}" alt=""></span>
                        </a>
                    </li>
                </ul>
                <p class="have-account">Don’t have an account yet? <a href="{{route('signup')}}">Create Account</a></p>
            </div> --}}
        </div>
    </div>
</section>
@endsection
