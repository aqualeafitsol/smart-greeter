@extends('layouts.app')
@section('content')
<section class="user-details-sec pb-0 main-background pt_90 position-relative lft-rgt-corner-bg min-100vh">
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
                        <li class="step-two step-box active complete">
                            <span class="step-text">pick a physical product</span>
                        </li>
                        <li class="step-three step-box active complete">
                            <span class="step-text">finalize and pay</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row pt-50px">
            <div class="col-12">
                <div class="stepcomplete">
                    <div class="complete-buble">
                        <h4>Congratulations!</h4>
                        <p>Your payment went through and you purchased our product</p>
                        <a href="{{route('dashboard')}}">CLick to dashboard</a>
                    </div>
                    <span class="stepcomplete-img">
                        <img class="img-block" src="{{url('image/banner-img.svg')}}" alt="">
                    </span>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('scripts')
<script>
    setTimeout(function() {
        window.location.href = "{{route('dashboard')}}"
    }, 10000); // 10 second
 </script>
@endpush