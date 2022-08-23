<!doctype html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- fab -->
        <link rel="icon" type="image/ico" sizes="32x32" href="{{url('image/favicon.ico')}}">
        <!-- fab -->
        <title>Reset Password</title>
        <!-- Google Font -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <!-- Radio and Check Box Design -->
        <link rel="stylesheet" href="{{url('css/build.css')}}">
        <!-- Css Style -->
        <link rel="stylesheet" href="{{url('css/style.css')}}">
    </head>

<body>
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
                @include('flashmessage.flash-message')
                <h4>Reset Password</h4>
            </div>
            <form action="{{route('reset.password.post')}}" method="post">
                @csrf
                <div class="log-create-box-body">
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="input-style-wrap">
                        <label>Password</label>
                        <input type="password" placeholder="Password" name="password" class="form-control input-style">
                        @if($errors->has('password'))
                            <div class="error">{{ $errors->first('password') }}</div>
                        @endif
                    </div>
                    <div class="input-style-wrap">
                        <label>Confirm password</label>
                        <input type="password" placeholder="Confirm password" name="password_confirmation" class="form-control input-style">
                        @if($errors->has('password_confirmation'))
                            <div class="error">{{ $errors->first('password_confirmation') }}</div>
                        @endif
                    </div>
                    
                    <div class="account-btn-wrap">
                        <button class="account-btn" type="submit">Reset</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- Jquary -->
<script src="{{url('js/jquery-3.6.0.js')}}"></script>
<!-- Bootstrap js -->
<script src="{{url('js/bootstrap.js')}}"></script>
<!-- Custom Js -->
<script src="{{url('js/custom.js')}}"></script>
</body>

</html>
