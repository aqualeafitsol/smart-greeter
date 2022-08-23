@extends('layouts.app')
@section('content')
<style>
    
</style>
<section class="user-details-sec main-background pt_90 position-relative lft-rgt-corner-bg min-100vh details_sec">
    <div class="container-fluid p-h-60">
        <div class="row grid-gap">
            @include('includes.left')
            <div class="col-profile-rgt">
                @if(Auth::user()->active_plan_id)
                <div class="profile-rgt-wrap">
                    <div class="upgred-alert black-box">
                        @include('flashmessage.flash-message')
                        <p><span class="atten-icon"><img class="img-block" src="{{url('image/attention.svg')}}" alt=""></span> are on plan FREE. Upgrade NOW to see more analytics,etc. <a href="{{route('plan.list')}}">Try other plans.</a></p>
                    </div>
                    <div class="row">
                        <div class="col-lg-5 col-md-12 col-sm-12 col-12">
                            <div class="row">
                                <div class="col-lg-12 col-md-6 col-sm-6 col-6">
                                    <div class="black-box chart-box plan-user-free">
                                        <div class="plan-user-blur">
                                            <div class="row justify-content-between">
                                                <div class="col-auto">
                                                    <div class="chart-head">
                                                        <h4>Daily visits</h4>
                                                    </div>
                                                </div>
                                                <div class="col-auto user-free-hide">
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
                                        <div class="plan-user-free-box">
                                            <p>For above plan users Free</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-6 col-sm-6 col-6">
                                    <div class="black-box chart-box plan-user-free">
                                        <div class="plan-user-blur">
                                            <div class="row justify-content-between">
                                                <div class="col-auto">
                                                    <div class="chart-head">
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
                                                <span class="elips-chart"><img class="img-block" src="{{url('image/chart-graphic.svg')}}" alt=""></span>
                                            </div>
                                        </div>
                                        <div class="plan-user-free-box">
                                            <p>For above plan users Free</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-12 col-sm-12 col-12">
                            <div class="lft-lightnevy-blue-box blue-box-repet">
                                <div class="row justify-content-between">
                                    <div class="col-auto">
                                        <div class="chart-head">
                                            <h4>Your Orders</h4>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="view-more-table">
                                            <a href="#" class="view-more-rt">view more</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="order-table table-top-border table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Order</th>
                                                <th>Status</th>
                                                <th>Date</th>
                                                <th>Sum</th>
                                                <th>Link</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($orders as $order)
                                            <tr>
                                                <td><span class="status-dot @if($order->delivery_status == 1) processing @elseif ($order->delivery_status == 2) on-the-way @elseif ($order->delivery_status == 3) deliverd @else  @endif "></span></td>
                                                <td>
                                                    <span class="order-img"><img class="img-block" src="{{url('image/order-img.svg')}}" alt=""></span>
                                                </td>
                                                <td>
                                                    <span class="status-box @if($order->delivery_status == 1) processing @elseif ($order->delivery_status == 2) on-the-way @elseif ($order->delivery_status == 3) deliverd @else  @endif">@if($order->delivery_status == 1) In Processing @elseif ($order->delivery_status == 2) On the way @elseif ($order->delivery_status == 3) Deliverd @else  @endif</span>
                                                </td>
                                                <td>{{ \Carbon\Carbon::parse($order->created_at)->isoFormat('MMMM DD')}}</td>
                                                <td>{{$order->sub_total}} $</td>
                                                <td>
                                                    <div class="link-btn-wrap">
                                                        <ul class="d-flex justify-content-center">
                                                            <li><a class="link-btn" href="{{route('user.sticker.add',['id' => Crypt::encryptString($order->id)])}}">Update link</a></li>
                                                            @if (isset($order->sticker->unique_id))
                                                                <li>
                                                                    <a class="link-btn qr_code_modal" href="javascript:;" data-bs-toggle="modal" data-bs-target="#qrcodeModal" data-qrcode ="{{url('qrcode/'.$order->sticker->qrcode)}}">
                                                                        <span class="link-btn-icon"><img class="img-block" src="{{url('image/qr-code.svg')}}" alt=""></span>
                                                                    </a>
                                                                </li>
                                                                <li><a class="link-btn" href="{{route('user.sticker.edit',[$order->sticker->id])}}">
                                                                    <span class="link-btn-icon"><img class="img-block" src="{{url('image/hand.svg')}}" alt=""></span>
                                                                </a></li>
                                                                <li><a class="link-btn" href="javascript:void(0)"  onclick="copyLink('{{route('user.sticker.view',[@$order->sticker->unique_id])}}')">Copy link</a></li>
                                                                
                                                            @else
                                                                <li>
                                                                    <a class="link-btn disable-btn" href="#">
                                                                        <span class="link-btn-icon"><img class="img-block" src="{{url('image/qr-code.svg')}}" alt=""></span>
                                                                    </a>
                                                                </li>
                                                                <li><a class="link-btn disable-btn" href="#">
                                                                    <span class="link-btn-icon"><img class="img-block" src="{{url('image/hand.svg')}}" alt=""></span>
                                                                </a></li> 
                                                                <li><a class="link-btn disable-btn" href="javascript:void(0)"  onclick="copyLink('')">Copy link</a></li>   
                                                            @endif
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            @empty
                                                
                                            @endforelse
                                           {{--  <tr>
                                                <td><span class="status-dot deliverd"></span></td>
                                                <td>
                                                    <span class="order-img"><img class="img-block" src="{{url('image/order-img.svg')}}" alt=""></span>
                                                </td>
                                                <td>
                                                    <span class="status-box deliverd">Deliverd</span>
                                                </td>
                                                <td>April 11</td>
                                                <td>95.50 $</td>
                                                <td>
                                                    <div class="link-btn-wrap">
                                                        <ul class="d-flex justify-content-center">
                                                            <li><a class="link-btn" href="#">add link</a></li>
                                                            <li>
                                                                <a class="link-btn" href="#">
                                                                    <span class="link-btn-icon"><img class="img-block" src="{{url('image/qr-code.svg')}}" alt=""></span>
                                                                </a>
                                                            </li>
                                                            <li><a class="link-btn" href="#">
                                                                <span class="link-btn-icon"><img class="img-block" src="{{url('image/hand.svg')}}" alt=""></span>
                                                            </a></li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><span class="status-dot processing"></span></td>
                                                <td>
                                                    <span class="order-img"><img class="img-block" src="{{url('image/order-img.svg')}}" alt=""></span>
                                                </td>
                                                <td>
                                                    <span class="status-box processing">Processing</span>
                                                </td>
                                                <td>April 11</td>
                                                <td>95.50 $</td>
                                                <td>
                                                    <div class="link-btn-wrap">
                                                        <ul class="d-flex justify-content-center">
                                                            <li><a class="link-btn" href="#">add link</a></li>
                                                            <li>
                                                                <a class="link-btn" href="#">
                                                                    <span class="link-btn-icon"><img class="img-block" src="{{url('image/qr-code.svg')}}" alt=""></span>
                                                                </a>
                                                            </li>
                                                            <li><a class="link-btn" href="#">
                                                                <span class="link-btn-icon"><img class="img-block" src="{{url('image/hand.svg')}}" alt=""></span>
                                                            </a></li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><span class="status-dot deliverd"></span></td>
                                                <td>
                                                    <span class="order-img"><img class="img-block" src="{{url('image/order-img.svg')}}" alt=""></span>
                                                </td>
                                                <td>
                                                    <span class="status-box deliverd">Deliverd</span>
                                                </td>
                                                <td>April 11</td>
                                                <td>95.50 $</td>
                                                <td>
                                                    <div class="link-btn-wrap">
                                                        <ul class="d-flex justify-content-center">
                                                            <li><a class="link-btn" href="#">add link</a></li>
                                                            <li>
                                                                <a class="link-btn" href="#">
                                                                    <span class="link-btn-icon"><img class="img-block" src="{{url('image/qr-code.svg')}}" alt=""></span>
                                                                </a>
                                                            </li>
                                                            <li><a class="link-btn" href="#">
                                                                <span class="link-btn-icon"><img class="img-block" src="{{url('image/hand.svg')}}" alt=""></span>
                                                            </a></li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr> --}}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            {{-- <div class="lft-lightnevy-blue-box blue-box-repet">
                                <div class="row justify-content-between">
                                    <div class="col-auto">
                                        <div class="chart-head">
                                            <h4>Your created pages</h4>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="view-more-table">
                                            <a href="#" class="view-more-rt">Settings</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="created-page table-top-border table-responsive">
                                    <table class="table mb-0">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <span class="arrow-rt-img"><img class="img-block" src="{{url('image/right-arrow.svg')}}" alt=""></span>
                                                </td>
                                                <td>Namenamename</td>
                                                <td><a href="#" class="created-page-link">https://pages.com/order/shots/popular/moneykogfjtt</a></td>
                                                <td>
                                                    <div class="page-btn-wrap">
                                                        <ul class="d-flex justify-content-center">
                                                            <li><a class="page-edit-btn" href="#">edit</a></li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="arrow-rt-img"><img class="img-block" src="{{url('image/right-arrow.svg')}}" alt=""></span>
                                                </td>
                                                <td>Namenamename</td>
                                                <td><a href="#" class="created-page-link">https://pages.com/order/shots/popular/moneykogfjtt</a></td>
                                                <td>
                                                    <div class="page-btn-wrap">
                                                        <ul class="d-flex justify-content-center">
                                                            <li><a class="page-edit-btn" href="#">edit</a></li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="arrow-rt-img"><img class="img-block" src="{{url('image/right-arrow.svg')}}" alt=""></span>
                                                </td>
                                                <td>Namenamename</td>
                                                <td><a href="#" class="created-page-link">https://pages.com/order/shots/popular/moneykogfjtt</a></td>
                                                <td>
                                                    <div class="page-btn-wrap">
                                                        <ul class="d-flex justify-content-center">
                                                            <li><a class="page-edit-btn" href="#">edit</a></li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="arrow-rt-img"><img class="img-block" src="{{url('image/right-arrow.svg')}}" alt=""></span>
                                                </td>
                                                <td>Namenamename</td>
                                                <td><a href="#" class="created-page-link">https://pages.com/order/shots/popular/moneykogfjtt</a></td>
                                                <td>
                                                    <div class="page-btn-wrap">
                                                        <ul class="d-flex justify-content-center">
                                                            <li><a class="page-edit-btn" href="#">edit</a></li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="arrow-rt-img"><img class="img-block" src="{{url('image/right-arrow.svg')}}" alt=""></span>
                                                </td>
                                                <td>Namenamename</td>
                                                <td><a href="#" class="created-page-link">https://pages.com/order/shots/popular/moneykogfjtt</a></td>
                                                <td>
                                                    <div class="page-btn-wrap">
                                                        <ul class="d-flex justify-content-center">
                                                            <li><a class="page-edit-btn" href="#">edit</a></li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="arrow-rt-img"><img class="img-block" src="{{url('image/right-arrow.svg')}}" alt=""></span>
                                                </td>
                                                <td>Namenamename</td>
                                                <td><a href="#" class="created-page-link">https://pages.com/order/shots/popular/moneykogfjtt</a></td>
                                                <td>
                                                    <div class="page-btn-wrap">
                                                        <ul class="d-flex justify-content-center">
                                                            <li><a class="page-edit-btn" href="#">edit</a></li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="arrow-rt-img"><img class="img-block" src="{{url('image/right-arrow.svg')}}" alt=""></span>
                                                </td>
                                                <td>Namenamename</td>
                                                <td><a href="#" class="created-page-link">https://pages.com/order/shots/popular/moneykogfjtt</a></td>
                                                <td>
                                                    <div class="page-btn-wrap">
                                                        <ul class="d-flex justify-content-center">
                                                            <li><a class="page-edit-btn" href="#">edit</a></li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
                @else
                <div class="profile-rgt-wrap">
                    <div class="upgred-alert black-box">
                        @include('flashmessage.flash-message')
                        <p><span class="atten-icon"><img class="img-block" src="{{url('image/attention.svg')}}" alt=""></span> you have NO plan selected <a href="{{route('plan.list')}}"> Pick your plan now.</a></p>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
<!-- Modal -->
<div class="modal fade page-modal qrcode-Modal" id="qrcodeModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="qrcodeLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="far fa-times-circle"></i></button>
            <div class="modal-body">
                <div class="qrcode-show-wrap">
                    <span class="qrcode-show">
                        <img id="qrcode_img" src="" class="img-block" alt="">
                    </span>
                    <div class="text-center">
                        <a id="qrcode_link" href="#" class="qrcode-download" download>download</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    
    //Qrcode modal Open 
    $(document).on('click','.qr_code_modal', function(){
        var qr_link = $(this).data('qrcode');
        $('#qrcode_img').attr('src',qr_link);
        $('#qrcode_link').attr('href',qr_link);
    });
    var $temp = $("<input>");
    function copyLink(url){
        $("body").append($temp);
        $temp.val(url).select();
        document.execCommand("copy");
        $temp.remove();
        //$("p").text("URL copied!");
        toastr.success('Link copied!')
    }
</script>
@endpush