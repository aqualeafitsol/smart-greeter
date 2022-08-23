@extends('layouts.app')
@section('content')
<section class="user-details-sec main-background pt_90 pb-50px position-relative lft-rgt-corner-bg min-100vh">
    <spn class="content-colka"><img class="img-block" src="{{url('image/plan-colka-lft.png')}}" alt=""></spn>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="content-page">
                    <h4>{{$cms->page_name}}</h4>
                    {!!$cms->content!!}
                </div>
            </div>
        </div>
    </div>
</section>

@include('includes.footer')
@endsection