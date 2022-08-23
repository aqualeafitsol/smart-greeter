@extends('layouts.app')
@section('content')
<section class="user-details-sec main-background pt_90 position-relative lft-rgt-corner-bg min-100vh details_sec">
    <div class="container-fluid p-h-60">
        <div class="row grid-gap">
            @include('includes.left')
            <div class="col-profile-rgt">
                <div class="profile-rgt-wrap">
                    <form action="{{route('user.sticker.save')}}" method="post" enctype="multipart/form-data" id="form_sticker_save">
                        @csrf
                        <input type="hidden" name="order_id" value="{{$enc_order_id}}">
                        <div class="row">
                            <div class="col-lg-5 col-md-5 col-sm-12 col-12">
                                <div class="black-box edit-profile-wrap">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="edit-top">
                                                <ul class="d-flex justify-content-center">
                                                    <li class="edit-top-box when-add-chkbox">
                                                        <div class="avatar-upload2">
                                                            <div class="avatar-edit">
                                                                <input type='file' name="profile_image" id="profile_image" accept=".png, .jpg, .jpeg" />
                                                                <label for="profile_image"></label>
                                                            </div>
                                                            <div class="avatar-preview">
                                                                <div class="image-preview" id="imagePreview" style="background-image: url('{{url('image/avatar.jpg')}}');">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="chkbox-wrap">
                                                            <div class="checkbox">
                                                                <input type="checkbox" name="chk_profile_image" id="chk_profile_image">
                                                                <label for="chk_profile_image"></label>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="edit-top-box when-add-chkbox">
                                                        <div class="avatar-upload2">
                                                            <div class="avatar-edit">
                                                                <input type='file' name="cover_image" id="imageUpload1" accept=".png, .jpg, .jpeg" />
                                                                <label for="imageUpload1"></label>
                                                            </div>
                                                            <div class="avatar-preview">
                                                                <div class="image-preview" id="imagePreview1" style="background-image: url('{{url('image/picture-line.svg')}}');">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="chkbox-wrap">
                                                            <div class="checkbox">
                                                                <input type="checkbox" name="chk_cover_image" id="chk_cover_image">
                                                                <label for="chk_cover_image"></label>
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
                                                    <input type="text" placeholder="Enter name" class="form-control input-style" name="name" id="name" value="">
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
                                                    <input type="text" placeholder="Enter email" class="form-control input-style" name="email" value="" id="email">
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
                                                    <input type="text" placeholder="Enter adress" class="form-control input-style" name="address" id="adress">
                                                    <div class="chkbox-wrap">
                                                        <div class="checkbox">
                                                            <input type="checkbox" id="chk_adress" name="chk_address">
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
                                                    <input type="checkbox" id="chk_social" name="chk_social">
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
                                                            <a  href="javascript:;" onclick="openSocialInput('Facebook')" id="fb">
                                                                <span class="social-icon-box facebook"><img class="img-block" src="{{url('image/facebook.png')}}" alt=""></span>
                                                                {{-- <span class="social-icon-check"><i class="fas fa-check"></i></span> --}}
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;" onclick="openSocialInput('Linkedin')" id="lnkdin">
                                                                <span class="social-icon-box linkedin"><img class="img-block" src="{{url('image/linkedin.png')}}" alt=""></span>
                                                                {{-- <span class="social-icon-check"><i class="fas fa-check"></i></span> --}}
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;" onclick="openSocialInput('Twitter')" id="twiter">
                                                                <span class="social-icon-box tweeter"><img class="img-block" src="{{url('image/twitter.png')}}" alt=""></span>
                                                                {{-- <span class="social-icon-check"><i class="fas fa-check"></i></span> --}}
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;" onclick="openSocialInput('Instagram')" id="insta">
                                                                <span class="social-icon-box instagram"><img class="img-block" src="{{url('image/instagram.png')}}" alt=""></span>
                                                                {{-- <span class="social-icon-check"><i class="fas fa-check"></i></span> --}}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <input type="hidden" name="fb_link" id="fb_link" value="">
                                            <input type="hidden" name="linkedin_link" id="linkedin_link" value="">
                                            <input type="hidden" name="twitter_link" id="twitter_link" value="">
                                            <input type="hidden" name="insta_link" id="insta_link" value="">
                                            <div class="col-12">
                                                <div class="input-style-wrap mb-0">
                                                    <label>Paste google maps embed iframe</label>
                                                    <div class="when-add-chkbox">
                                                        <input type="text" placeholder="<iframe src='https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3683.5291880577415!2d88.40342371443442!3d22.596705737781175!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39f89f4627c52241%3A0x4eacf9d839c1f49!2sAqualeaf%20IT%20Solutions%20Pvt%20Ltd!5e0!3m2!1sen!2sin!4v1657018248511!5m2!1sen!2sin' width='600' height='450' style='border:0;' allowfullscreen='' loading='lazy' referrerpolicy='no-referrer-when-downgrade'></iframe>" class="form-control input-style" name="g_map_link" id="g_map_link">
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
                                                <div class="map-wrap" id="input_gmap">
                                                   {{--  <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14733.751552147369!2d88.41129395!3d22.600117699999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1656651334452!5m2!1sen!2sin" width="500" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> --}}
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="input-style-wrap mb-0">
                                                    <label>URL</label>
                                                    <div class="when-add-chkbox">
                                                        <input type="url" placeholder="https//:" class="form-control input-style" name="url" id="url">
                                                        <div class="chkbox-wrap">
                                                            <div class="checkbox">
                                                                <input type="checkbox" id="chk_url" name="chk_url">
                                                                <label for="chk_url"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="upload-img">
                                                    <span class="btn_upload up-img-btn">
                                                        <input type="file" id="imageUpload" multiple title="" name="images[]" class="input-img" accept=".png, .jpg, .jpeg" />
                                                        Upload image
                                                    </span>
                                                    <div class="img-show">
                                                        <div class="member-preview">
                                                            <div class="multiImagePreview" style="background-image: url();" data-src="">
                                                            </div>
                                                        </div>
                                                    </div>
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

<!-- Sticker preview Modal -->
<div class="modal fade sticker-modal" id="stickerModal" tabindex="-1" aria-labelledby="stickerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="far fa-times-circle"></i></button>
        <div class="modal-body">
            <div class="user-sticker-wrap">
                <div class="user-sticker-box">
                    <div class="user-sticker-bg">
                        <span class="cover-photo">
                            <img id="modal_cover_image" src="{{url('image/sticker-bg.png')}}" class="img-block">
                        </span>
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
                                <a href="#" id="modal_facebook_link">
                                    <span class="social-icon-box facebook"><img class="img-block" src="{{url('image/facebook.png')}}" alt=""></span>
                                </a>
                            </li>
                            <li>
                                <a href="#" id="modal_linkedin_link">
                                    <span class="social-icon-box linkedin"><img class="img-block" src="{{url('image/linkedin.png')}}" alt=""></span>
                                </a>
                            </li>
                            <li>
                                <a href="#" id="modal_twitter_link">
                                    <span class="social-icon-box tweeter"><img class="img-block" src="{{url('image/twitter.png')}}" alt=""></span>
                                </a>
                            </li>
                            <li>
                                <a href="#" id=modal_instagram_link>
                                    <span class="social-icon-box instagram"><img class="img-block" src="{{url('image/instagram.png')}}" alt=""></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="sticker-map">
                        <div class="sticker-map-box" id="gmap">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d471219.7256039201!2d88.32972875!3d22.6759958!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1655729081491!5m2!1sen!2sin" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                        <div class="location-show-wrap" id="location_show_wrap">
                            <span class="location-show" id="modal_adress"><i class="fas fa-map-marker-alt"></i>18 Albert Embankment, London SE1 7TJ, England</span>
                        </div>
                    </div>
                    <div class="sticker-click-here-btn">
                        <span class="sticker-img"><img class="img-block" src="{{url('image/click-here-bg.png')}}" alt=""></span>
                        <a href="javascript:;" class="sticker-click-btn" data-bs-toggle="modal" data-bs-target="#stickerClickModal" id="sticker_click_image">Click here</a>
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


<!-- Modal -->
<div class="modal fade page-modal" id="stickerClickModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="qrcodeLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="far fa-times-circle"></i></button>
            <div class="modal-body" id="modalClickSlider">
                
            </div>
        </div>
    </div>
</div>
<!-- Social Link Enter -->
<div class="modal fade page-modal" id="socialLinkModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="socialLinkLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="far fa-times-circle"></i></button>
        <form id="form_social_link">
        <div class="modal-body">
            <div class="input-style-wrap">
                <label class="mb-2" id="social_modal_title">Link</label>
                <input type="url" placeholder="Enter Link" class="form-control input-style" id="input_social_link" required>
            </div>
            <div class="link-submit">
                <button type="submit" class="link-submit-btn" id="social_link_submit">save</button>
            </div>
        </div>
        </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
            //let imgurl = $('#profile_image').attr('src');
            let imgurl = $('#imagePreview').data('src');
            $('#modal_profile_image').attr('src',imgurl);
        }

        let cover_img_url = '{{{ url('image/sticker-bg.png')}}}';
        $('#modal_cover_image').attr('src',cover_img_url);
        if($('#chk_cover_image').is(':checked')){
            //let imgurl = $('#profile_image').attr('src');
            let cover_img_url = $('#imagePreview1').data('src');
            $('#modal_cover_image').attr('src',cover_img_url);
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
        }else{
            $('#location_show_wrap').hide();
        }   

        if($('#adress').val() == ''){
            $('#location_show_wrap').hide();
        }else{
            $('#location_show_wrap').show();
        }

        $('#modal_social_link').hide();
        if($('#chk_social').is(':checked')){
            $('#modal_social_link').show();
            $('#modal_facebook_link').attr('href',($('#fb_link').val() ? $('#fb_link').val() : '#'));
            $('#modal_linkedin_link').attr('href',($('#linkedin_link').val() ? $('#linkedin_link').val() : '#'));
            $('#modal_twitter_link').attr('href',($('#twitter_link').val() ? $('#twitter_link').val() : '#'));
            $('#modal_instagram_link').attr('href',($('#insta_link').val() ? $('#insta_link').val() : '#'));
        }

        $('#gmap').hide();
        if($('#chk_g_map_link').is(':checked')){
            //console.log($('#g_map_link').val());
            $('#gmap').html($('#g_map_link').val())
            $('#gmap').show();
        }
        
        
    });

    $("#g_map_link").on("change",function() {
        $('#input_gmap').html(this.value)
        
    });

    //Multiple image Preview
    $("#imageUpload").change(function() {
        readURL3(this);
    });

    function readURL3(input) {
    if (input.files && input.files[0]) {
            var filesAmount = input.files.length;
            //console.log(filesAmount);
            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    var d = $('.multiImagePreview:first').clone()
                    d.css('background-image', 'url('+e.target.result +')');
                    d.html('<span class="img-delete"><button type="button" class="cls-img-btn remove_icon"><i class="fas fa-times"></i></button></span>');
                    d.attr('data-src',e.target.result);
                    d.hide();
                    d.fadeIn(650);
                    $('.member-preview').append($(d));
                    $(".img-delete").click(function(){
                    $(this).parent(".multiImagePreview").remove();
                    });
                }
                reader.readAsDataURL(input.files[i]);
            }
        }
    }

    //End Multiple image preview
    
    //Profile Image Preview
    function readURL(input) {
        if (input.files && input.files[0]) {
            
            var reader = new FileReader();
            reader.onload = function(e) {
                //console.log(e.target.result)
                $('#imagePreview').css('background-image', 'url('+e.target.result +')').attr('data-src',e.target.result);
                $('#imagePreview').hide();
                $('#imagePreview').fadeIn(650);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#profile_image").change(function() {
        readURL(this);
    });

    //Cover Image Preview
    function readURL1(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#imagePreview1').css('background-image', 'url('+e.target.result +')').attr('data-src',e.target.result);
                $('#imagePreview1').hide();
                $('#imagePreview1').fadeIn(650);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#imageUpload1").change(function() {
        readURL1(this);
    });
    
    $(document).on('click','#sticker_click_image', function(){
        $('#modalClickSlider').html('<div class="owl-carousel owl-theme img_slider img-slider-arrow" id="image_slider">');
        $(".multiImagePreview").each(function() {   
            if($(this).data('src') != ''){
                $('.owl-carousel').append(`<div class="item">
                        <img id="" src="`+$(this).data('src')+`" class="img-block" alt="">
                    </div>`);      
                }
        });  
        var owl = $("#image_slider");
        owl.owlCarousel({
            autoplay:false,
            stagePadding:5,
            autoplayTimeout:5000,
            loop:true,
            margin:8,
            mouseDrag:false,
            nav:true,
            dots:false,
            navElement: 'div',
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:1
                },
                1000:{
                    items:1
                }
            }
        }); 
    });

    //Social link input model
    function openSocialInput(modalType){
        if(modalType == 'Facebook'){
            $('#input_social_link').val($('#fb_link').val()); 
        }
        if(modalType == 'Linkedin'){
            $('#input_social_link').val($('#linkedin_link').val());
        }
        if(modalType == 'Twitter'){
            $('#input_social_link').val($('#twitter_link').val());
        }
        if(modalType == 'Instagram'){
            $('#input_social_link').val($('#insta_link').val());
        }
        //$('#input_social_link').val('');
        $('#input_social_link').attr('data-type','');
        $('#social_modal_title').text(modalType +' Link');
        $('#input_social_link').attr('placeholder','Enter '+modalType+' Link').attr('data-type',modalType);
        $('#socialLinkModal').modal('show');
        //console.log(modalType);
    }
    // Social link value store
    $('#form_social_link').submit(function(event){
        var social_type = $('#input_social_link').attr('data-type');
        var input_val = $('#input_social_link').val();
        if(social_type == 'Facebook'){
            $('#fb_link').val(input_val);
            $('#fb').append('<span class="social-icon-check"><i class="fas fa-check"></i></span>');
        }
        if(social_type == 'Linkedin'){
            $('#linkedin_link').val(input_val);
            $('#lnkdin').append('<span class="social-icon-check"><i class="fas fa-check"></i></span>');
        }
        if(social_type == 'Twitter'){
            $('#twitter_link').val(input_val);
            $('#twiter').append('<span class="social-icon-check"><i class="fas fa-check"></i></span>');
        }
        if(social_type == 'Instagram'){
            $('#insta_link').val(input_val);
            $('#insta').append('<span class="social-icon-check"><i class="fas fa-check"></i></span>');
        }
        $('#socialLinkModal').modal('hide')
        event.preventDefault();
    });

    $('#form_sticker_save').submit( function(event){
        var limit = 10;
        var img_count = ($(".multiImagePreview").length) - 1;
        if(img_count > limit){
            swal("You can select max "+limit+" images.", "", "error");
            return false;
        }else{
            
            $("#loading_container").attr("style", "display:block");
            return true;
        }
        
    });

</script>
@endpush