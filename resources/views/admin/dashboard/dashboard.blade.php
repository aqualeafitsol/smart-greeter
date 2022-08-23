@extends('layouts.admin')
@section('content')
<section class="user-details-sec main-background pt_90 position-relative lft-rgt-corner-bg min-100vh details_sec">
    <div class="container-fluid p-h-60">
        <div class="row grid-gap">
            @include('admin.includes.left')
            <div class="col-profile-rgt">
                <div class="profile-rgt-wrap">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-lg-2 col-md-2 col-sm-12 col-12 mb-4">
                                    <div class="black-box chart-box h-100">
                                        <div class="row">
                                            <div class="col-auto">
                                                <div class="chart-head2">
                                                    <h4>Select page</h4>
                                                </div>
                                                <div class="select-page-wrap">
                                                    <ul>
                                                        <li><a href="#">page 1</a></li>
                                                        <li><a href="#">page 2</a></li>
                                                        <li><a href="#">page 3</a></li>
                                                        <li><a href="#">page 4</a></li>
                                                        <li><a href="#">page 5</a></li>
                                                        <li><a href="#">page 6</a></li>
                                                        <li><a href="#">page 7</a></li>
                                                        <li><a href="#">page 8</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12 col-12 mb-4">
                                    <div class="lft-lightnevy-blue-box h-100">
                                        <div class="user-visitor text-center">
                                            <p>Today, May 20</p>
                                            <div class="visitor-chart">
                                                <div class="progress" id="progress">
                                                    <span class="progress-path"></span>
                                                    <div class="inner">
                                                        <h3>2,4 k</h3>
                                                        <p>visits</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12 col-12 mb-4">
                                    <div class="black-box chart-box h-100">
                                        <div class="chart-head2">
                                            <h4>Time spend on the page</h4>
                                        </div>
                                        <div class="blk-left-wrap">
                                            <img class="img-block" src="{{url('Admin/image/lines.png')}}" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 col-12 mb-4">
                                    <div class="black-box chart-box">
                                        <div class="row justify-content-between align-items-center">
                                            <div class="col-auto">
                                                <div class="chart-head2">
                                                    <h4 class="mb-0">Daily visits</h4>
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
                                            <img class="img-block" src="{{url('Admin/image/chart.jpg')}}" alt="">
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
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-12 mb-sm-4 mb-md-0">
                                    <div class="black-box chart-box h100">
                                        <div class="row justify-content-between">
                                            <div class="col-auto">
                                                <div class="chart-head2">
                                                    <h4>Number of clicks</h4>
                                                </div>
                                            </div>
                                        </div>                                   
                                        <div class="chart-wrap">
                                            <img class="img-block" src="{{url('Admin/image/line-chart.png')}}" alt="">
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
                                                <li><button type="button" class="bar-chart-btn">week</button></li>
                                                <li class="active"><button type="button" class="bar-chart-btn">month</button></li>
                                                <li><button type="button" class="bar-chart-btn">year</button></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-12 mb-sm-4 mb-md-0">
                                    <div class="lft-lightnevy-blue-box chart-box h-100">
                                        <div class="block-wrap d-flex">
                                            <div class="blk-left-wrap">
                                                <img class="img-block" src="{{url('Admin/image/chart-bar.png')}}" alt="">
                                            </div>
                                            <div class="blk-right-wrap">
                                                <div class="chart-head2">
                                                    <h4>Blocks</h4>
                                                </div>
                                                <div class="block-wrap">
                                                    <ul>
                                                        <li><a href="#">page 1</a></li>
                                                        <li><a href="#">page 2</a></li>
                                                        <li><a href="#">page 3</a></li>
                                                        <li><a href="#">page 4</a></li>
                                                        <li><a href="#">page 5</a></li>
                                                        <li><a href="#">page 6</a></li>
                                                        <li><a href="#">page 7</a></li>
                                                        <li><a href="#">page 8</a></li>
                                                    </ul>
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
        </div>
    </div>
</section>

@endsection