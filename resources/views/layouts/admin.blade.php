<!doctype html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- fab -->
        <link rel="icon" type="image/ico" sizes="32x32" href="{{url('Admin/image/favicon.ico')}}">
        <!-- fab -->
        <title>::Smart Greeter::</title>
        <!-- Google Font -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <!-- Video Css Style -->
        <link rel="stylesheet" href="http://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">

        <link rel="stylesheet" href="{{url('Admin/css/video-js.min.css')}}" media="all">
        <!-- Progress Css Style -->
        <link rel="stylesheet" href="{{url('Admin/css/progress.css')}}" media="all">
        <!-- Css Style -->
        <link rel="stylesheet" href="{{url('Admin/css/build.css')}}">

        <link rel="stylesheet" href="{{url('Admin/css/style.css')}}">

        <link rel="stylesheet" href="{{url('Admin/css/admin-custom.css')}}">

        <!-- Jquary -->
        <script src="{{url('Admin/js/jquery-3.6.0.js')}}" type="text/javascript"></script>

        <script src="http://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
        
        <!-- Bootstrap js -->
        <script src="{{url('Admin/js/bootstrap.js')}}"></script>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.19.1/ckeditor.js"></script>
        <!-- Video js -->
        <script src="{{url('Admin/js/video.min.js')}}"></script>
        <!-- Custom Js -->
        <script src="{{url('Admin/js/custom.js')}}"></script>
    </head>
<body>
    <!-- Header -->
    @include('admin.includes.header')
    
    <!-- Body -->
    @yield('content')
    
    <!-- Footer -->
    {{-- @include('includes.footer') --}}

    @stack('scripts')

</body>
</html>