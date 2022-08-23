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
                        <li class="step-one step-box active progressing">
                            <span class="step-text">pick a subscription</span>
                        </li>
                        <li class="step-two step-box">
                            <span class="step-text">pick a physical product</span>
                        </li>
                        <li class="step-three step-box">
                            <span class="step-text">finalize and pay</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            @if (count($plans) > 0 )
                @foreach ($plans as $key=>$plan)
                    <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                        <div class="home-plan-box {{$key == 1 ? 'plan-basic' : ''}} {{$key == 2 ? 'plan-all-in' : ''}}">
                            <h4>{{$plan->name}}</h4>
                            <p>{{$plan->description}}</p>
                            <ul>
                                @foreach ($plan->getPlanPackage as $planPackage)
                                    <li>{{$planPackage->name}}</li>
                                @endforeach
                               
                            </ul>
                            <span class="plan-price">{{$plan->price}} <i class="fas fa-dollar-sign"></i></span>
                            <a href="{{route('plan.one.post',$plan->id)}}" class="btn-plan">I want It</a>
                        </div>
                    </div>
                @endforeach
                
            @else
            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                <div class="home-plan-box">
                    <h4>Free</h4>
                    <p>NFC technology implemented - you buy the sticker once and use forever!</p>
                    <ul>
                        <li>change info</li>
                        <li>limited taps</li>
                        <li>limited blocks with NO change</li>
                        <li>NO analytics</li>
                        <li>SG branded</li>
                    </ul>
                    <span class="plan-price">15.50 <i class="fas fa-dollar-sign"></i></span>
                    <a href="#" class="btn-plan">I want It</a>
                </div>
            </div>  
            @endif

            {{-- <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                <div class="home-plan-box plan-basic">
                    <h4>Basic</h4>
                    <p>NFC technology implemented - you buy the sticker once and use forever!</p>
                    <ul>
                        <li>change info</li>
                        <li>limited taps</li>
                        <li>limited blocks with NO change</li>
                        <li>NO analytics</li>
                        <li>SG branded</li>
                    </ul>
                    <span class="plan-price">35.50 <i class="fas fa-dollar-sign"></i></span>
                    <a href="plans-step2.html" class="btn-plan">I want It</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                <div class="home-plan-box plan-all-in">
                    <h4>All-in</h4>
                    <p>NFC technology implemented - you buy the sticker once and use forever!</p>
                    <ul>
                        <li>change info</li>
                        <li>limited taps</li>
                        <li>limited blocks with NO change</li>
                        <li>NO analytics</li>
                        <li>SG branded</li>
                    </ul>
                    <span class="plan-price">55.50 <i class="fas fa-dollar-sign"></i></span>
                    <a href="plans-step2.html" class="btn-plan">I want It</a>
                </div>
            </div> --}}
        </div>
    </div>
</section>

@endsection