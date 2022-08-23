@extends('layouts.app')
@section('content')
<section class="user-details-sec main-background pt_90 pb-50px position-relative lft-rgt-corner-bg min-100vh">
    <span class="plan-colka1"><img class="img-block" src="{{url('image/plan-colka-lft.png')}}" alt=""></span>
    <span class="plan-colka2"><img class="img-block" src="{{url('image/plan-colka-rgt.png')}}" alt=""></span>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="order-progrss-wrap">
                    <ul class="d-flex">
                        <li class="step-one step-box active complete">
                            <span class="step-text">pick a subscription</span>
                        </li>
                        <li class="step-two step-box active complete">
                            <span class="step-text">pick a physical product</span>
                        </li>
                        <li class="step-three step-box active progressing">
                            <span class="step-text">finalize and pay</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <form id="paysubmit" action="{{route('processTransaction')}}" method="get">
            @csrf
            <div class="row pt-50px">
                <div class="col-lg-7 col-md-7 col-sm-12 col-12">
                    <div class="pay-product-box">
                        <h4>Payment Method</h4>
                        <p>All transactions are secure and encrypted. Credit card infirmation is never stored</p>
                        <ul class="radio-wrap">
                            <li>
                                <ul>
                                    <li class="radio">
                                        <input type="radio" id="credit_card" name="payment" value="credit_card">
                                        <label for="credit_card">Credit Card</label>
                                    </li>
                                </ul>
                                <div class="card-details" style="display: none;">
                                    <div class="row justify-content-end">
                                        <div class="col-auto">
                                            <span class="card-type-pic">
                                                <img class="img-block" src="{{url('image/card-type-img.png')}}" alt="">
                                            </span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="payment-address-input">
                                                <label>Card Number</label>
                                                <input type="text" class="form-control address-input" placeholder="XXXX    XXXX    XXXX   XXXX" name="card_number" id="card_number">
                                            </div>
                                        </div>
                                        <div class="col-lg-5 col-md-5 col-sm-12 col-12">
                                            <div class="payment-address-input">
                                                <label>Name on Card</label>
                                                <input type="text" class="form-control address-input" placeholder="IVAN IVANOV" name="card_holder_name">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                                            <div class="payment-address-input">
                                                <label>Expiration Date</label>
                                                <input type="text" class="form-control address-input" placeholder="MM/YY" name="exp_mm_yy">
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-6 col-6">
                                            <div class="payment-address-input">
                                                <label>CCV</label>
                                                <input type="text" class="form-control address-input" placeholder="***" name="card_cvv">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="radio">
                                <input type="radio" id="radio2" name="payment" value="paypal" {{(Session::has('payment') && Session::get('payment') == 'paypal') ? "checked" : ''}}>
                                <label for="radio2">PayPal Account</label>
                            </li>
                        </ul>
                    </div>
                    <div class="pay-product-box">
                        <h4>Adress</h4>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="payment-address-input">
                                    <label>Country</label>
                                    <input type="text" class="form-control address-input" name="country" placeholder="USA" id="country" value="{{Session::has('country') ? Session::get('country') : ''}}">
                                    @if($errors->has('country'))
                                        <div class="error">{{ $errors->first('country') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="payment-address-input">
                                    <label>State/City</label>
                                    <input type="text" class="form-control address-input" name="state" placeholder="Alabama, Montgomery" id="state" value="{{Session::has('state1') ? Session::get('state1') : ''}}">
                                    @if($errors->has('state'))
                                    <div class="error">{{ $errors->first('state') }}</div>
                                @endif
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-6 col-12">
                                <div class="payment-address-input">
                                    <label>Residence data</label>
                                    <input type="text" class="form-control address-input" name="residence_data" placeholder="18 Albert Embankment" id="residence_data" value="{{Session::has('residence_data') ? Session::get('residence_data') : ''}}">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="payment-address-input">
                                    <label>Postcode</label>
                                    <input type="text" class="form-control address-input" name="post_code" placeholder="XXXXXX" id="post_code" value="{{Session::has('post_code') ? Session::get('post_code') : ''}}">
                                    @if($errors->has('post_code'))
                                    <div class="error">{{ $errors->first('post_code') }}</div>
                                @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="plan_id" id="plan_id" value="{{$plan_id}}">
                <input type="hidden" name="package_id" id="package_id" value="{{$package_id}}">
                <input type="hidden" name="qty" id="qty" value="{{$qty}}">
                <div class="col-lg-5 col-md-5 col-sm-12 col-12">
                    <div class="pay-product-box">
                        <h4>Your order</h4>
                        <ul class="total-amount-wrap">
                            <li>
                                <p>{{@$productDetails->name}}</p>
                                <h5>{{number_format(($productDetails->price * $qty), 2) }} <i class="fas fa-dollar-sign"></i></h5>
                            </li>
                            <li>
                                <p>{{@$plan_details->name}}</p>
                                <h5>{{number_format($plan_details->price, 2)}} <i class="fas fa-dollar-sign"></i></h5>
                            </li>
                        </ul>
                        <ul class="total-amount-wrap">
                            <li>
                                <p>Total</p>
                                <h5>{{number_format($total_price, 2)}} <i class="fas fa-dollar-sign"></i></h5>
                            </li>
                            <li>
                                <p>Tax</p>
                                <h5>{{number_format($tax, 2)}} <i class="fas fa-dollar-sign"></i></h5>
                            </li>
                            <li>
                                <p>Final amount</p>
                                <h5>{{number_format($final_ammount, 2)}} <i class="fas fa-dollar-sign"></i></h5>
                            </li>
                        </ul>
                        <div class="pay-btn-wrap">
                            <button type="submit" class="pay-btn" id="pay">pay</button>
                            {{-- <a href="javascript:void(0)" id="pay" class="pay-btn pup_btn">pay</a> --}}
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="step-back">
                        <a href="{{route('plan.one.post',$plan_id)}}" class="step-back-btn">back</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<div class="authorized-popup pop_wrap">
    <div class="authorized-popup-wrap pop_red">
        <h4>You are not authorized</h4>
        <p>Please <a href="{{route('login')}}">login</a> or <a href="{{route('signup')}}">create</a> an account</p>
        <span class="popup-img">
            <img class="img-block" src="{{url('image/attention2.svg')}}" alt="">
        </span>
    </div>
</div>
@endsection

@push('scripts')
@if (!empty(Session::get('error_code')) && Session::get('error_code') == 5)
<script>
    $(function() {
        $(".pop_wrap").addClass("pop_open");
    });
    </script>
@endif
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-creditcardvalidator/1.2.0/jquery.creditCardValidator.js" > </script>
<script>
    $( document ).ready(function() {
        
        $('input[type=radio]').click(function () {
                if (this.id == "credit_card") {
                    $(".card-details").slideDown();
                } else {
                    $(".card-details").slideUp();
                }
            });

            $("#paysubmit").validate({
                rules: {
                    payment: "required",
                    card_number:  {
                        required: {
                            depends: function() {
                                return $('input[name=payment]:checked').val() == 'credit_card';
                            }
                        }
                    },
                    card_holder_name: {
                        required: {
                            depends: function() {
                                return $('input[name=payment]:checked').val() == 'credit_card';
                            }
                        }
                    },
                    exp_mm_yy: {
                        required: {
                            depends: function() {
                                return $('input[name=payment]:checked').val() == 'credit_card';
                            }
                        }
                    },
                    card_cvv: {
                        required: {
                            depends: function() {
                                return $('input[name=payment]:checked').val() == 'credit_card';
                            }
                        }
                    },
                    country: "required",
                    state: "required",
                    post_code: "required",
                }
            });     
    });

    $(document).on('keyup','#card_number',function(){
        cardFormValidate();
    });
   
    //Cradit card validation
    function cardFormValidate(){
    var cardValid = 0;

    //card number validation
    $('#card_number').validateCreditCard(function(result){
        if(result.valid){
            $("#card_number").removeClass('required');
            cardValid = 1;
        }else{
            $("#card_number").addClass('required');
            cardValid = 0;
        }
    });
      
    //card details validation
    var cardName = $("#name_on_card").val();
    var expMonth = $("#expiry_month").val();
    var expYear = $("#expiry_year").val();
    var cvv = $("#cvv").val();
    var regName = /^[a-z ,.'-]+$/i;
    var regMonth = /^01|02|03|04|05|06|07|08|09|10|11|12$/;
    var regYear = /^2017|2018|2019|2020|2021|2022|2023|2024|2025|2026|2027|2028|2029|2030|2031$/;
    var regCVV = /^[0-9]{3,3}$/;
    if (cardValid == 0) {
        $("#card_number").addClass('required');
        $("#card_number").focus();
        return false;
    }else if (!regMonth.test(expMonth)) {
        $("#card_number").removeClass('required');
        $("#expiry_month").addClass('required');
        $("#expiry_month").focus();
        return false;
    }else if (!regYear.test(expYear)) {
        $("#card_number").removeClass('required');
        $("#expiry_month").removeClass('required');
        $("#expiry_year").addClass('required');
        $("#expiry_year").focus();
        return false;
    }else if (!regCVV.test(cvv)) {
        $("#card_number").removeClass('required');
        $("#expiry_month").removeClass('required');
        $("#expiry_year").removeClass('required');
        $("#cvv").addClass('required');
        $("#cvv").focus();
        return false;
    }else if (!regName.test(cardName)) {
        $("#card_number").removeClass('required');
        $("#expiry_month").removeClass('required');
        $("#expiry_year").removeClass('required');
        $("#cvv").removeClass('required');
        $("#name_on_card").addClass('required');
        $("#name_on_card").focus();
        return false;
    }else{
        $("#card_number").removeClass('required');
        $("#expiry_month").removeClass('required');
        $("#expiry_year").removeClass('required');
        $("#cvv").removeClass('required');
        $("#name_on_card").removeClass('required');
        return true;
    }
}
         
</script> 
@endpush