<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- fab -->
        <link rel="icon" type="image/ico" sizes="32x32" href="{{url('image/favicon.ico')}}">
        <!-- fab -->
        <title>::Home::</title>
        <!-- Google Font -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <!-- Css Style -->
        <link rel="stylesheet" href="{{url('css/jquery.fancybox.min.css')}}">
        <link rel="stylesheet" href="{{url('css/devoloper.css')}}">
        <link rel="stylesheet" href="{{url('css/style.css')}}">

        
    </head>

<body class="bg-mob">
    
    <section class="user-details-sec position-relative res-device">
        <div class="container-fluid p-h-60">
            <div class="user-sticker-wrap">
                @if ($sticker->status == 0)
                    <div class="deactive-sticker-box"><p>Your Sticker is Deactive</p></div>
                @else
                    <div class="user-sticker-box">
                        <div class="user-sticker-bg">
                            <span class="cover-photo">
                                @if ($sticker->chk_cover_image == 'on')
                                    <img src="{{($sticker->cover_image != 'NULL') ? url('sticker/cover-image/'.$sticker->cover_image) : url('image/sticker-bg.png')}}" class="img-block">
                                @else
                                    <img src="{{url('image/sticker-bg.png')}}" class="img-block">
                                @endif  
                            </span>
                            <div class="usticker-info">
                                <span class="sticker-profile-pic">
                                    @if ($sticker->chk_profile_image == 'on')
                                        <img class="img-block" src="{{($sticker->cover_image != 'NULL') ? url('sticker/profile-image/'.$sticker->profile_image) : url('image/avatar.jpg')}}" alt="">
                                    @else
                                        <img class="img-block" src="{{url('image/avatar.jpg')}}" alt="">
                                    @endif
                                </span>
                                <h4>{{$sticker->chk_name == 'on' ? $sticker->name : ''}}</h4>
                                <p>{{$sticker->chk_bio == 'on' ? $sticker->bio : ''}}</p>
                                <ul class="d-flex user-contact-link justify-content-center">
                                    @if($sticker->chk_phone == 'on')
                                        <li><a href="tel:{{@$sticker->phone}}"><i class="fas fa-phone"></i></a></li>
                                    @endif
                                    @if($sticker->chk_email == 'on')
                                        <li><a href="mailto:{{@$sticker->email}}"><i class="fas fa-envelope"></i></a></li>
                                    @endif
                                    @if($sticker->chk_url == 'on')
                                        <li><a href="{{@$sticker->url ? $sticker->url : '#'}}"><i class="fas fa-link"></i></a></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                        @if($sticker->chk_social == 'on')                        
                            <div class="sticker-social">
                                <ul class="d-flex social-list justify-content-center">
                                    <li>
                                        <a href="{{$sticker->fb_link ? $sticker->fb_link : '#'}}">
                                            <span class="social-icon-box facebook"><img class="img-block" src="{{url('image/facebook.png')}}" alt=""></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{$sticker->linkedin_link ? $sticker->linkedin_link : '#'}}">
                                            <span class="social-icon-box linkedin"><img class="img-block" src="{{url('image/linkedin.png')}}" alt=""></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{$sticker->twitter_link ? $sticker->twitter_link : '#'}}">
                                            <span class="social-icon-box tweeter"><img class="img-block" src="{{url('image/twitter.png')}}" alt=""></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{$sticker->insta_link ? $sticker->insta_link : '#'}}">
                                            <span class="social-icon-box instagram"><img class="img-block" src="{{url('image/instagram.png')}}" alt=""></span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        @endif
                        <div class="sticker-map">
                            @if($sticker->chk_g_map_link == 'on')
                            <div class="sticker-map-box">
                            {!!@$sticker->g_map_link!!}
                            </div>
                            @endif
                            @if($sticker->chk_address == 'on')
                            <div class="location-show-wrap">
                                <span class="location-show"><i class="fas fa-map-marker-alt"></i>{{@$sticker->address}}</span>
                            </div>
                            @endif
                        </div>
                        <div class="sticker-click-here-btn">
                            <span class="sticker-img"><img class="img-block" src="{{url('image/click-here-bg.png')}}" alt=""></span>
                            <a href="javascript:;" class="sticker-click-btn" data-bs-toggle="modal" data-bs-target="#stickerClickModal" class="sticker-click-btn">Click here</a>
                        </div>
                        {{-- <div class="sticker-ftr-text">
                            <span class="text-logo"><img class="img-block" src="{{url('image/text-logo.png')}}" alt=""></span>
                        </div> --}}
                    </div>
                @endif
            </div>
        </div>
    </section>
    <!-- Modal -->
    <div class="modal fade page-modal" id="stickerClickModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="qrcodeLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="far fa-times-circle"></i></button>
            <div class="modal-body">
                @if(count($sticker->images) > 0 )
                    <div class="row g-0">
                        @foreach ($sticker->images as $image)
                        <div class="col-lg-3 col-md-3 col-sm-4 col-12 img-gall">
                            <a data-fancybox="img-gallery" href="{{url('sticker/images/'.$image->image)}}"><img class="img-block" src="{{url('sticker/images/'.$image->image)}}">
                            </a>
                        </div>
                        @endforeach
                    </div>
                @else
                <div>No Image found. </div>    
                @endif
            </div>
        </div>
        </div>
    </div>
    <script src="{{url('js/jquery-3.6.0.js')}}"></script>
    <!-- Bootstrap js -->
    <script src="{{url('js/bootstrap.js')}}"></script>

    <script src="{{url('js/jquery.fancybox.min.js')}}"></script>

    <script>

    </script>
</body>
</html>