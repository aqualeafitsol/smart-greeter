@extends('layouts.app')
@section('content')

<section class="user-details-sec main-background pt_90 position-relative lft-rgt-corner-bg min-100vh">
    <div class="container-fluid p-h-60">
        <div class="row grid-gap">
            @include('includes.left')
            <div class="col">
                <div class="profile-rgt-wrap">
                    <div class="upgred-alert black-box">
                        <p><span class="atten-icon"><img class="img-block" src="{{url('image/attention.svg')}}" alt=""></span> are on plan FREE. Upgrade NOW to see more analytics,etc. <a href="{{route('plan.list')}}">Try other plans.</a></p>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-lg-5 col-md-5 col-sm-12 col-12">
                                    <div class="black-box chart-box">
                                        <div class="row justify-content-between">
                                            <div class="col-auto">
                                                <div class="chart-head2">
                                                    <h4>Daily visits</h4>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <div class="bar-chart">
                                                    <ul class="d-flex">
                                                        <li class="active"><button type="button" class="bar-chart-btn">week</button></li>
                                                        <li><button type="button" class="bar-chart-btn">month</button></li>
                                                        <li><button type="button" class="bar-chart-btn">year</button></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="chart-wrap">
                                            <img class="img-block" src="{{url('image/chart.jpg')}}" alt="">
                                        </div>
                                        <div class="chart-sub-catagory">
                                            <ul class="d-flex justify-content-center">
                                                <li><span class="clr-cata andriod"></span>Andriod</li>
                                                <li><span class="clr-cata ios"></span>IOS</li>
                                                <li><span class="clr-cata other"></span>other</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                    <div class="black-box chart-box">
                                        <div class="user-visitor">
                                            <p>Today, May 20</p>
                                            <span class="visitor-bar2"><img class="img-block" src="{{url('image/visits.png')}}" alt=""></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                    <div class="black-box chart-box">
                                        <div class="row justify-content-between">
                                            <div class="col-auto">
                                                <div class="chart-head2">
                                                    <h4>Platform used</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="chart-sub-catagory">
                                            <ul class="d-flex justify-content-center">
                                                <li><span class="clr-cata andriod"></span>Andriod</li>
                                                <li><span class="clr-cata ios"></span>IOS</li>
                                                <li><span class="clr-cata other"></span>other</li>
                                            </ul>
                                        </div>                                        
                                        <div class="chart-wrap">
                                            <span class="elips-chart2"><img class="img-block" src="{{url('image/chart-graphic.svg')}}" alt=""></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                    <div class="black-box chart-box">
                                        <div class="row justify-content-between">
                                            <div class="col-auto">
                                                <div class="chart-head2">
                                                    <h4>Time spend on the page </h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="user-visitor">
                                            <span class="visitor-bar2"><img class="img-block" src="{{url('image/visits.png')}}" alt=""></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                    <div class="black-box chart-box">
                                        <div class="row justify-content-between">
                                            <div class="col-auto">
                                                <div class="chart-head2">
                                                    <h4>Number of clicks</h4>
                                                </div>
                                            </div>
                                        </div>                                   
                                        <div class="chart-wrap">
                                            <span class="elips-chart2"><img class="img-block" src="{{url('image/chart-graphic.svg')}}" alt=""></span>
                                        </div>
                                        <div class="chart-sub-catagory">
                                            <ul class="d-flex justify-content-center">
                                                <li><span class="clr-cata andriod"></span>Andriod</li>
                                                <li><span class="clr-cata ios"></span>IOS</li>
                                                <li><span class="clr-cata other"></span>other</li>
                                            </ul>
                                        </div>
                                        <div class="bar-chart mt-2">
                                            <ul class="d-flex justify-content-center">
                                                <li class="active"><button type="button" class="bar-chart-btn">week</button></li>
                                                <li><button type="button" class="bar-chart-btn">month</button></li>
                                                <li><button type="button" class="bar-chart-btn">year</button></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-5 col-sm-12 col-12">
                                    <div class="black-box chart-box">
                                        <div class="chart-wrap">
                                            <img class="img-block" src="{{url('image/chart.jpg')}}" alt="">
                                        </div>
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

@endsection