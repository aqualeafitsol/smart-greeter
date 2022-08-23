@extends('layouts.app')
@section('content')
<section class="user-details-sec main-background pt_90 pb-50px position-relative lft-rgt-corner-bg min-100vh">
    <spn class="plan-colka1"><img class="img-block" src="{{url('image/plan-colka-lft.png')}}" alt=""></spn>
    <spn class="plan-colka2"><img class="img-block" src="{{url('image/plan-colka-rgt.png')}}" alt=""></spn>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="order-progrss-wrap">
                    <ul class="d-flex">
                        <li class="step-one step-box active complete">
                            <span class="step-text">pick a subscription</span>
                        </li>
                        <li class="step-two step-box active progressing">
                            <span class="step-text">pick a physical product</span>
                        </li>
                        <li class="step-three step-box">
                            <span class="step-text">finalize and pay</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row pt-50px">
            <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                <form action="{{route('plan.two.post')}}" method="get">
                    @csrf
                    <div class="plan-product">
                        <span class="plan-product-img">
                            <img class="img-block" src="{{url('image/plan-robot.png')}}" alt="">
                        </span>
                        <p>Corporate sticker "Robot"</p>
                        <span class="product-price">15.50 <i class="fas fa-dollar-sign"></i></span>
                        <ul class="d-flex">
                            <li><button type="button" class="add-qty-btn" id="p_minus1"><i class="fas fa-minus"></i></button></li>
                            <li><input type="number" class="form-control add-qty-input" name="qty" value="1" id="total_count1"></li>
                            <li><button type="button" class="add-qty-btn" id="p_plus1"><i class="fas fa-plus"></i></button></li>
                        </ul>
                        <input type="hidden" name="plan_id" value="{{$plan_id}}">
                        <input type="hidden" name="package_id" value="1">
                        <button type="submit" class="pick-me-btn">pick me!</button>
                        {{-- <a href="{{route('plan.two.post',['plan_id'=>$plan_id,'package_id'=>1])}}" class="pick-me-btn">pick me!</a> --}}
                    </div>
                </form>
            </div>
           {{--  <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                <div class="plan-product">
                    <span class="plan-product-img">
                        <img class="img-block" src="image/plan-robot.png" alt="">
                    </span>
                    <p>Corporate sticker "Robot"</p>
                    <span class="product-price">15.50 <i class="fas fa-dollar-sign"></i></span>
                    <ul class="d-flex">
                        <li><button type="button" class="add-qty-btn"><i class="fas fa-minus"></i></button></li>
                        <li><input type="number" class="form-control add-qty-input" value="0"></li>
                        <li><button type="button" class="add-qty-btn"><i class="fas fa-plus"></i></button></li>
                    </ul>
                    <a href="plans-step3.html" class="pick-me-btn">pick me!</a>
                </div>
            </div> --}}
            <div class="col-12">
                <div class="step-back">
                    <a href="{{route('plan.list')}}" class="step-back-btn">back</a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@push('scripts')
<script>
    var number = 1;
    $(document).on('click','#p_plus1',function(){
        number++
        $('#total_count1').val(number);
    });
    
    $(document).on('click','#p_minus1',function(){
        if (number == 1) return;
        number--
        $('#total_count1').val(number);
    });
</script>
@endpush