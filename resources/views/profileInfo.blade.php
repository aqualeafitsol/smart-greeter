@extends('layouts.app')
@section('content')
<section class="user-details-sec main-background pt_90 position-relative lft-rgt-corner-bg min-100vh">
    <div class="container-fluid p-h-60">
        <div class="row grid-gap">
            @include('includes.left')
            <div class="col-profile-rgt">
                <div class="profile-rgt-wrap">
                    <form action="{{route('user.profile.save')}}" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-5 col-md-5 col-sm-12 col-12">
                                <div class="black-box edit-profile-wrap">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="edit-top">
                                                <ul class="d-flex justify-content-center">
                                                    <li class="edit-top-box when-add-chkbox">
                                                        @if(Auth::user()->profile_image)
                                                        <span class="edit-full-img">
                                                            <img class="img-block" src="{{url('image/profile_image/'.Auth::user()->profile_image)}}" alt="" id="profile_image">
                                                        </span>
                                                        @else
                                                        <span class="edit-top-icon">
                                                            <img class="img-block" src="{{url('image/picture-line.svg')}}" alt="">
                                                        </span>
                                                        @endif
                                                        <div class="chkbox-wrap">
                                                            <div class="checkbox">
                                                                <input type="checkbox" id="chk_profile_image">
                                                                <label for="chk_profile_image"></label>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="edit-top-box when-add-chkbox">
                                                        <span class="edit-top-icon">
                                                            <img class="img-block" src="{{url('image/logo-flickr.svg')}}" alt="">
                                                        </span>
                                                        <div class="chkbox-wrap">
                                                            <div class="checkbox">
                                                                <input type="checkbox" id="flickr">
                                                                <label for="flickr"></label>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="input-style-wrap">
                                                <label>Name</label>
                                                <div class="when-add-chkbox">
                                                    <input type="text" placeholder="Enter name" class="form-control input-style" name="name" id="name" value="{{Auth::user()->name}}">
                                                    <div class="chkbox-wrap">
                                                        <div class="checkbox">
                                                            <input type="checkbox" id="chk_name" name="chk_name">
                                                            <label for="chk_name"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="textare-style-wrap">
                                                <label>Bio</label>
                                                <div class="when-add-chkbox">
                                                    <textarea rows="5" class="form-control textarea-style" placeholder="Enter text..." name="bio" id="bio"></textarea>
                                                    <div class="chkbox-wrap">
                                                        <div class="checkbox">
                                                            <input type="checkbox" id="chk_bio" name="chk_bio">
                                                            <label for="chk_bio"></label>
                                                        </div>
                                                    </div>
                                                </div>                                                   
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                            <div class="input-style-wrap">
                                                <label>Phone</label>
                                                <div class="when-add-chkbox">
                                                    <input type="text" placeholder="Enter Phone" class="form-control input-style" name="phone" id="phone">
                                                    <div class="chkbox-wrap">
                                                        <div class="checkbox">
                                                            <input type="checkbox" id="chk_phone" name="chk_phone">
                                                            <label for="chk_phone"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                            <div class="input-style-wrap">
                                                <label>Email</label>
                                                <div class="when-add-chkbox">
                                                    <input type="text" placeholder="Enter email" class="form-control input-style" name="email" value="{{Auth::user()->email}}" id="email">
                                                    <div class="chkbox-wrap">
                                                        <div class="checkbox">
                                                            <input type="checkbox" id="chk_email" name="chk_email">
                                                            <label for="chk_email"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="input-style-wrap mb-0">
                                                <label>Adress</label>
                                                <div class="when-add-chkbox">
                                                    <input type="text" placeholder="Enter adress" class="form-control input-style" name="adress" id="adress">
                                                    <div class="chkbox-wrap">
                                                        <div class="checkbox">
                                                            <input type="checkbox" id="chk_adress" name="chk_adress">
                                                            <label for="chk_adress"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-7 col-sm-12 col-12">
                                <div class="black-box billing-shiping-info">
                                    <div class="row justify-content-between">
                                        <div class="col-auto">
                                            <div class="chart-head">
                                                <h4>Connect social networks</h4>
                                            </div>
                                        </div>
                                        <div class="col-auto chkbx-2">
                                            <div class="chkbox-wrap">
                                                <div class="checkbox">
                                                    <input type="checkbox" id="chk_social">
                                                    <label for="chk_social"></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="your-plan-wrap">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="edit-landin-page-social">
                                                    <ul class="d-flex social-list justify-content-center">
                                                        <li>
                                                            <a href="#">
                                                                <span class="social-icon-box facebook"><img class="img-block" src="{{url('image/facebook.png')}}" alt=""></span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                <span class="social-icon-box linkedin"><img class="img-block" src="{{url('image/linkedin.png')}}" alt=""></span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                <span class="social-icon-box tweeter"><img class="img-block" src="{{url('image/twitter.png')}}" alt=""></span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                <span class="social-icon-box instagram"><img class="img-block" src="{{url('image/instagram.png')}}" alt=""></span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="input-style-wrap mb-0">
                                                    <label>Paste google maps link</label>
                                                    <div class="when-add-chkbox">
                                                        <input type="url" placeholder="https//:" class="form-control input-style" name="g_map_link">
                                                        <div class="chkbox-wrap">
                                                            <div class="checkbox">
                                                                <input type="checkbox" id="chk_g_map_link" name="chk_g_map_link">
                                                                <label for="chk_g_map_link"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="map-wrap">
                                                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14733.751552147369!2d88.41129395!3d22.600117699999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1656651334452!5m2!1sen!2sin" width="500" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="input-style-wrap mb-0">
                                                    <label>URL</label>
                                                    <div class="when-add-chkbox">
                                                        <input type="url" placeholder="https//:" class="form-control input-style">
                                                        <div class="chkbox-wrap">
                                                            <div class="checkbox">
                                                                <input type="checkbox" id="url">
                                                                <label for="url"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="upload-img">
                                                    <span class="btn_upload up-img-btn">
                                                        <input type="file" id="imag" title="" name="image" class="input-img"/>
                                                        Upload image
                                                    </span>
                                                    <div class="img-show" style="display: none;">
                                                        <img id="ImgPreview" src="" class="img-block" />
                                                        <!-- <button id="removeImage1" type="button" class="btn btn-danger close-img">+</button> -->
                                                    </div>
                                                    <!-- <button type="button" class="up-img-btn">Upload image</button> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">                                    
                                <div class="save-btn-wrap">
                                    <ul class="d-flex justify-content-center">
                                        <li><button type="submit" class="save-prv-btn">save</button></li>
                                        <li><button type="button" type="submit" id="preview" class="save-prv-btn" data-bs-toggle="modal" data-bs-target="#stickerModal">preview</button></li>
                                        <li><button type="button" class="save-prv-btn cancel">cancel</button></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade sticker-modal" id="stickerModal" tabindex="-1" aria-labelledby="stickerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="far fa-times-circle"></i></button>
        <div class="modal-body">
            <div class="user-sticker-wrap">
                <div class="user-sticker-box">
                    <div class="user-sticker-bg position-relative d-flex align-items-end justify-content-center" style="background: url({{url('image/sticker-bg.png')}}) no-repeat center center;">
                        <div class="usticker-info">
                            <span class="sticker-profile-pic"><img id="modal_profile_image" class="img-block" src="{{url('image/avatar.jpg')}}" alt=""></span>
                            <h4 id="modal_name">michel smith</h4>
                            <p id="modal_bio">I’m an entrepreneur, check out my page. Thank you for your attention</p>
                            <ul class="d-flex user-contact-link justify-content-center">
                                <li id="model_phone_icon"><a href="#" id="modal_phone"><i class="fas fa-phone"></i></a></li>
                                <li id="model_email_icon"><a href="#" id="modal_email"><i class="fas fa-envelope"></i></a></li>
                                <li id="model_link_icon"><a href="#" id="modal_link"><i class="fas fa-link"></i></a></li>
                            </ul>
                        </div>
                    </div>                        
                    <div class="sticker-social" id="modal_social_link">
                        <ul class="d-flex social-list justify-content-center">
                            <li>
                                <a href="#" id="facebook_link">
                                    <span class="social-icon-box facebook"><img class="img-block" src="{{url('image/facebook.png')}}" alt=""></span>
                                </a>
                            </li>
                            <li>
                                <a href="#" id="linkedin_link">
                                    <span class="social-icon-box linkedin"><img class="img-block" src="{{url('image/linkedin.png')}}" alt=""></span>
                                </a>
                            </li>
                            <li>
                                <a href="#" id="twitter_link">
                                    <span class="social-icon-box tweeter"><img class="img-block" src="{{url('image/twitter.png')}}" alt=""></span>
                                </a>
                            </li>
                            <li>
                                <a href="#" id=instagram_link>
                                    <span class="social-icon-box instagram"><img class="img-block" src="{{url('image/instagram.png')}}" alt=""></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="sticker-map">
                        <div class="sticker-map-box" id="gmap">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d471219.7256039201!2d88.32972875!3d22.6759958!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1655729081491!5m2!1sen!2sin" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                        <div class="location-show-wrap">
                            <span class="location-show" id="modal_adress"><i class="fas fa-map-marker-alt"></i>18 Albert Embankment, London SE1 7TJ, England</span>
                        </div>
                    </div>
                    <div class="sticker-click-here-btn">
                        <span class="sticker-img"><img class="img-block" src="{{url('image/click-here-bg.png')}}" alt=""></span>
                        <a href="#" class="sticker-click-btn">Click here</a>
                    </div>
                    <div class="sticker-ftr-text">
                        <span class="text-logo"><img class="img-block" src="{{url('image/text-logo.png')}}" alt=""></span>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    
    var checkBoxes = $("input[type='checkbox']");
    checkBoxes.prop('checked', true); //all checkbox checked

    /* Preview button disable when all check box are unchecked */
    checkBoxes.change(function(){
        $('#preview').prop('disabled', checkBoxes.filter(':checked').length < 1);
    });
    checkBoxes.change();

    $(document).on('click','#preview',function(){

        $('#modal_name').text('');
        if($('#chk_name').is(':checked')){
            $('#modal_name').text($('#name').val());
        }

        let imgurl = '{{{ url('image/avatar.jpg')}}}';
        $('#modal_profile_image').attr('src',imgurl);
        if($('#chk_profile_image').is(':checked')){
            let imgurl = $('#profile_image').attr('src');
            $('#modal_profile_image').attr('src',imgurl);
        }
        
        $('#modal_bio').text('');
        if($('#chk_bio').is(':checked')){
            $('#modal_bio').text($('#bio').val());
        }
        
        $('#model_phone_icon').hide();
        $('#modal_phone').attr('href','#');
        if($('#chk_phone').is(':checked')){
            $('#modal_phone').attr('href',"tel:"+ $('#phone').val());
            $('#model_phone_icon').show();
        }

        $('#model_email_icon').hide();
        $('#modal_email').attr('href','#');
        if($('#chk_email').is(':checked')){
            $('#modal_email').attr('href',"mailto:"+ $('#email').val());
            $('#model_email_icon').show();
        }

        $('#modal_adress').text('');
        if($('#chk_adress').is(':checked')){
            $('#modal_adress').text($('#adress').val());
        }   

        $('#modal_social_link').hide();
        if($('#chk_social').is(':checked')){
            $('#modal_social_link').show();
        }

        $('#gmap').hide();
        if($('#chk_g_map_link').is(':checked')){
            $('#gmap').show();
        }


        
    });
</script>
@endpush