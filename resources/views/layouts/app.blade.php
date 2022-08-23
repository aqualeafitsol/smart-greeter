<!doctype html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- fab -->
        <link rel="icon" type="image/ico" sizes="32x32" href="{{url('image/favicon.ico')}}">
        <!-- fab -->
        <title>::Smart Greeter::</title>
        <!-- Google Font -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <!-- Video Css Style -->
        <link rel="stylesheet" href="{{url('css/video-js.min.css')}}" media="all">
        <!-- Progress Css Style -->
        <link rel="stylesheet" href="{{url('css/progress.css')}}" media="all">
        <!-- Owl Css Style -->
        <link rel="stylesheet" href="{{url('css/owl.carousel.css')}}" media="all">
        
        <link rel="stylesheet" href="{{url('css/jquery.fancybox.min.css')}}" media="all">
        <!-- Css Style -->
        <link rel="stylesheet" href="{{url('css/build.css')}}">
        
        <link rel="stylesheet" href="{{url('css/devoloper.css')}}">

        <link rel="stylesheet" href="{{url('css/style.css')}}">

        <!-- Jquary -->
        <script src="{{url('js/jquery-3.6.0.js')}}" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
        <!-- Bootstrap js -->
        <script src="{{url('js/bootstrap.js')}}"></script>
        <!-- Video js -->
        <script src="{{url('js/video.min.js')}}"></script>
        <!-- owl js -->
        <script src="{{url('js/owl.carousel.js')}}"></script>
        
        <script src="{{url('js/jquery.fancybox.min.js')}}"></script>
        <!-- Custom Js -->
        <script src="{{url('js/custom.js')}}"></script>
    </head>
<body>
    <!-- Header -->
    @include('includes.header')
    
    <!-- Body -->
    @yield('content')
    
    <!-- Footer -->
    {{-- @include('includes.footer') --}}

    @stack('scripts')
    {{-- Start Loader  --}}
    <div id="loading_container" class="loading-container" style="display: none">
        <div class="custom-line">
            <div class="loader loader-1">
                <div class="loader loader-2">
                    <div class="loader loader-1">
                        <div class="loader loader-2">
                            <div class="loader loader-1"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- End loader --}}
</body>
</html>