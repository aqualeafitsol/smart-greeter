@extends('layouts.app')
@section('content')

<section class="user-details-sec main-background pt_90 position-relative lft-rgt-corner-bg min-100vh details_sec">
    <div class="container-fluid p-h-60">
        <div class="row grid-gap">
            @include('includes.left')
            <div class="col-profile-rgt">
                @include('flashmessage.flash-message')
                <div class="profile-rgt-wrap">
                    <div class="row">
                        <div class="col-lg-5 col-md-5 col-sm-12 col-12">
                            <form action="{{route('user.profile.update')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="black-box edit-profile-wrap">
                                    <div class="profile-img-wrap">
                                        <div class="avatar-upload">
                                            <div class="avatar-edit">
                                                <input type='file' id="imageUpload" name="profile_image" accept=".png, .jpg, .jpeg" />
                                                <label for="imageUpload"></label>
                                            </div>
                                            <div class="avatar-preview">
                                                <div id="imagePreview" style="background-image: url('{{ Auth::user()->profile_image ? url('image/profile_image/'.Auth::user()->profile_image) : url('image/avatar.jpg')}}');">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <span class="profile-pic"><img class="img-block" src="image/avatar.jpg" alt=""></span> -->
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                            <div class="input-style-wrap">
                                                <ul class="d-flex justify-content-between">
                                                    <li>
                                                        <label>First name</label>
                                                    </li>
                                                    <li><span class="lbl-icon"><img class="img-block" class="img-block" src="{{url('image/pen.svg')}}" alt=""></span></li>
                                                </ul>
                                                <input type="text" placeholder="First name" name="first_name" class="form-control input-style" value="{{$first_name}}">
                                                @if($errors->has('first_name'))
                                                    <div class="error">{{ $errors->first('first_name') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                            <div class="input-style-wrap">
                                                <ul class="d-flex justify-content-between">
                                                    <li>
                                                        <label>Last name</label>
                                                    </li>
                                                    <li><span class="lbl-icon"><img class="img-block" src="{{url('image/pen.svg')}}" alt=""></span></li>
                                                </ul>
                                                <input type="text" placeholder="First name" class="form-control input-style" name="last_name" value="{{$last_name}}">
                                                @if($errors->has('last_name'))
                                                    <div class="error">{{ $errors->first('last_name') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="input-style-wrap">
                                                <ul class="d-flex justify-content-between">
                                                    <li>
                                                        <label>Email adress</label>
                                                    </li>
                                                    <li><span class="lbl-icon"><img class="img-block" class="img-block" src="{{url('image/pen.svg')}}" alt=""></span></li>
                                                </ul>
                                                <input type="text" placeholder="Email" class="form-control input-style" name="email" value="{{$user->email}}">
                                                @if($errors->has('email'))
                                                    <div class="error">{{ $errors->first('email') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="input-style-wrap">
                                                <ul class="d-flex justify-content-between">
                                                    <li>
                                                        <label>Old Password</label>
                                                    </li>
                                                    <li><span class="lbl-icon"><img class="img-block" src="{{url('image/pen.svg')}}" alt=""></span></li>
                                                </ul>
                                                <input type="password" placeholder="Enter Old Password" class="form-control input-style" name="old_password">
                                                @if($errors->has('old_password'))
                                                    <div class="error">{{ $errors->first('old_password') }}</div>
                                                @endif
                                                <ul class="d-flex justify-content-end">
                                                    <li><a class="remember-pass" href="{{route('forget.password.get')}}">I don't remember my password</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="input-style-wrap">
                                                <ul class="d-flex justify-content-between">
                                                    <li>
                                                        <label>New Password</label>
                                                    </li>
                                                    <li><span class="lbl-icon"><img class="img-block" src="{{url('image/pen.svg')}}" alt=""></span></li>
                                                </ul>
                                                <input type="password" placeholder="Enter New Password" class="form-control input-style" name="password">
                                                @if($errors->has('password'))
                                                    <div class="error">{{ $errors->first('password') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="input-style-wrap">
                                                <ul class="d-flex justify-content-between">
                                                    <li>
                                                        <label>Confirm Password</label>
                                                    </li>
                                                    <li><span class="lbl-icon"><img class="img-block" src="{{url('image/pen.svg')}}" alt=""></span></li>
                                                </ul>
                                                <input type="password" placeholder="Enter Confirm Password" class="form-control input-style" name="password_confirmation">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="profile-save-wrap">
                                                <button type="submit" class="profile-save-btn">Saved changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-12 col-12">
                            <div class="black-box billing-shiping-info">
                                <div class="row justify-content-between">
                                    <div class="col-auto">
                                        <div class="chart-head">
                                            <h4>Billing and shipping info</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="order-table table-top-border table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Country</th>
                                                <th>City</th>
                                                <th>Post code</th>
                                                <th>Phone number</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        @if(count($orders) > 0)
                                            <tbody>
                                                @foreach ($orders as $order)
                                                <tr>
                                                    <td>{{$order->shippingDetail->country}}</td>
                                                    <td >{{$order->shippingDetail->state}}</td>
                                                    <td>{{$order->shippingDetail->post_code}}</td>
                                                    <td>{{$order->shippingDetail->phone_no}}</td>
                                                    <td><a class="text-white ship_bill_info" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#edit_billing_address_modal" data-id="{{$order->shippingDetail->id}}" data-phone-no="{{$order->shippingDetail->phone_no}}" data-post-code="{{$order->shippingDetail->post_code}}" data-state="{{$order->shippingDetail->state}}" data-country="{{$order->shippingDetail->country}}" data-residence-data="{{$order->shippingDetail->residence_data}}"><i class="fas fa-edit"></i></a></td>
                                                </tr>  
                                                @endforeach
                                                
                                            </tbody>
                                        @endif
                                    </table>
                                </div>
                            </div>
                            <div class="black-box billing-shiping-info">
                                <div class="row justify-content-between">
                                    <div class="col-auto">
                                        <div class="chart-head">
                                            <h4>Your plan</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="your-plan-wrap">
                                    <div class="row">
                                        @if (count($plans) > 0 )
                                            @foreach ($plans as $key=>$plan)
                                                <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                                    <div class="your-plan-box {{Auth::user()->active_plan_id == $plan->id ? '' : 'when-enhance-option'}}">
                                                        <div class="plan-box-content">
                                                            <h4>{{@$plan->name}}</h4>
                                                            <ul>
                                                                @foreach ($plan->getPlanPackage as $planPackage)
                                                                    <li>{{$planPackage->name}}</li>
                                                                @endforeach
                                                            </ul>
                                                            <span class="using-plan-details">you are using</span>
                                                        </div>
                                                        @if (Auth::user()->active_plan_id != $plan->id)
                                                            <div class="enhance-option">
                                                                <span class="enhance-icon">
                                                                    <img class="img-block" src="{{url('image/enhance.svg')}}" alt="">
                                                                </span>
                                                                <p>Enhance your options</p>
                                                                <a href="{{route('plan.list')}}">click here</a>
                                                            </div>
                                                        @endif
                                                        
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                        {{-- <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                            <div class="your-plan-box when-enhance-option">
                                                <div class="plan-box-content basic">
                                                    <h4>Basic</h4>
                                                    <ul>
                                                        <li>change info</li>
                                                        <li>limited taps</li>
                                                        <li>limited blocks with NO change</li>
                                                        <li>NO analytics</li>
                                                        <li>SG branded</li>
                                                    </ul>
                                                    <span class="using-plan-details">you are using</span>
                                                </div>
                                                <div class="enhance-option">
                                                    <span class="enhance-icon">
                                                        <img class="img-block" src="{{url('image/enhance.svg')}}" alt="">
                                                    </span>
                                                    <p>Enhance your options</p>
                                                    <a href="#">click here</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                            <div class="your-plan-box when-enhance-option">
                                                <div class="plan-box-content all-in">
                                                    <h4>All-in</h4>
                                                    <ul>
                                                        <li>change info</li>
                                                        <li>limited taps</li>
                                                        <li>limited blocks with NO change</li>
                                                        <li>NO analytics</li>
                                                        <li>SG branded</li>
                                                    </ul>
                                                    <span class="using-plan-details">you are using</span>
                                                </div>
                                                <div class="enhance-option">
                                                    <span class="enhance-icon">
                                                        <img class="img-block" src="{{url('image/enhance.svg')}}" alt="">
                                                    </span>
                                                    <p>Enhance your options</p>
                                                    <a href="#">click here</a>
                                                </div>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- Edit Billing And Shipping Info --}}
<div class="modal fade page-modal biling-address" id="edit_billing_address_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="socialLinkLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title page-modal-title">Edit Billing And Shipping Info</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="far fa-times-circle"></i></button>
            </div>
            <form action="{{route('user.address.update')}}" id="form_billing_shipping_info" method="post">
                @csrf
                <div class="modal-body">
                    <div class="input-style-wrap">
                        <label class="mb-2">Country</label>
                        <input type="text" name="country" placeholder="Enter Country" class="form-control input-style" id="modal_country"> 
                    </div>
                    <div class="input-style-wrap">
                        <label class="mb-2">City</label>
                        <input type="text" placeholder="Enter City" name="state" class="form-control input-style" id="modal_city">
                    </div>
                    <div class="input-style-wrap">
                        <label class="mb-2">Residence data</label>
                        <input type="text" placeholder="Enter Residence data" name="residence_data" class="form-control input-style" id="modal_residence_data">
                    </div>
                    <div class="input-style-wrap">
                        <label class="mb-2" id="">Post code</label>
                        <input type="text" placeholder="Enter Post code" name="post_code" class="form-control input-style" id="modal_post_code">
                    </div>
                    <div class="input-style-wrap">
                        <label class="mb-2" id="">Phone Number</label>
                        <input type="number" name="phone_no" placeholder="Enter Phone Number" class="form-control input-style" id="modal_phone_no">
                    </div>
                    <input type="hidden" name="id" id="model_a_id">
                    <div class="link-submit">
                        <button type="submit" class="link-submit-btn" id="billing_shipping_info_submit">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    /* window.onload = function onLoad() {
        var progressBar = 
        new ProgressBar.Circle('#progress', {
            color: '#1DCDFE',
            strokeWidth: 14,
            duration: 2000, // milliseconds
            easing: 'easeInOut'
        });
        progressBar.animate(.50); // percent
    }; */


    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#imagePreview').css('background-image', 'url('+e.target.result +')');
                $('#imagePreview').hide();
                $('#imagePreview').fadeIn(650);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#imageUpload").change(function() {
        readURL(this);
    });

    $(document).on('click','.ship_bill_info', function(){
        //var dataId = $(this).attr("data-city");
        //console.log(dataId);
        $('#modal_country').val($(this).attr("data-country"));
        $('#modal_city').val($(this).attr("data-state"));
        $('#modal_post_code').val($(this).attr("data-post-code"));
        $('#modal_phone_no').val($(this).attr("data-phone-no"));
        $('#modal_residence_data').val($(this).attr("data-residence-data"));
        $('#model_a_id').val($(this).attr("data-id"));
    });

    $( "#form_billing_shipping_info").validate({
            rules: {
                country: {
                    required: true,
                },
                state: {
                    required: true,
                },
                post_code: {
                    required:true,
                },
                phone_no: {
                    required:false,
                    digits: true
                }
            },

            /* submitHandler: function (form) {
                $.ajax({
                    type: "POST",
                    //url: "{{route('contact_us')}}",
                    data: $(form).serialize(),
                    success: function () {
                        //$(form).html("<div id='message'></div>");
                        //$('#message').html("<h2>Thank you for getting in touch!</h2>")
                        
                    }
                });
                return false; // required to block normal submit since you used ajax
            } */
        });

</script>

@endpush

@push('styles')
    {{-- <style>
        .error{
            display: none!important;
        }
    </style> --}}
@endpush