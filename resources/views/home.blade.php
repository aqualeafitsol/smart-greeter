@extends('layouts.app')
@section('content')
<section class="user-details-sec main-background d-flex align-items-center pt_90 position-relative home-lft-rgt-bg min-100vh">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7 col-md-7 col-sm-12 col-12">
                @include('flashmessage.flash-message')
                <div class="banner-wrap">
                    <div class="banner-text">
                        <h4>Hola! We are</h4>
                        <h3>The SmartGreeter Team</h3>  
                        <h2>Do you want to</br> see <span class="business-text">Your Business</span> here?</h2>
                        <p>We are currently working hard to provide you with a revolutionary contactless solution to engage with your potential customers!</p>                          
                    </div>
                    <ul class="d-flex banner-social">
                        <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                    </ul>
                    <div class="custom-btn-wrap">
                        <a href="#" class="custom-btn-atag">Contact Us</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-5 col-sm-12 col-12">
                <div class="banner-img">
                    <span class="banner-img-box"><img class="img-block" src="{{url('image/banner-img.svg')}}" alt=""></span>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="black-area-sec pt-100px pb-100px calka" id="usersection">
    <span class="colka1"><img class="img-block" src="{{url('image/colka1.png')}}" alt=""></span>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="default-sec-head max-wd">
                    <h3>What is in it for you?!</h3>
                    <p>{{@$settings->what_for_you}}</p>
                </div>
            </div>
            <div class="col-12">
                <div class="tab-wrap">
                    <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                          <button class="nav-link active" id="business-tab" data-bs-toggle="tab" data-bs-target="#business" type="button" role="tab" aria-controls="home" aria-selected="true">Business user</button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="nav-link" id="private-tab" data-bs-toggle="tab" data-bs-target="#private" type="button" role="tab" aria-controls="profile" aria-selected="false">Private user</button>
                        </li>
                      </ul>
                      <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="business" role="tabpanel" aria-labelledby="business-tab">
                            <div class="row">
                                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                    <div class="business-user-box">
                                        <span class="business-user-img">
                                            <img class="img-block" src="{{url('image/nfc.svg')}}" alt="">
                                        </span>
                                        <h4>NFC technology</h4>
                                        <p>NFC technology implemented - you buy the chip once and use it for years!</p>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                    <div class="business-user-box">
                                        <span class="business-user-img">
                                            <img class="img-block" src="{{url('image/qr.svg')}}" alt="">
                                        </span>
                                        <h4>QR code</h4>
                                        <p>QR code included to cover the 10% of non-NFC enabled devices.</p>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                    <div class="business-user-box">
                                        <span class="business-user-img">
                                            <img class="img-block" src="{{url('image/real-time.svg')}}" alt="">
                                        </span>
                                        <h4>Real Time</h4>
                                        <p>Change business information in real time and get real time statistics!</p>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                    <div class="business-user-box">
                                        <span class="business-user-img">
                                            <img class="img-block" src="{{url('image/inovation.svg')}}" alt="">
                                        </span>
                                        <h4>Innovation</h4>
                                        <p>Use new technology to attract innovative and open-minded customers.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="private" role="tabpanel" aria-labelledby="private-tab">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                                    <div class="business-user-box">
                                        <span class="business-user-img">
                                            <img class="img-block" src="{{url('image/nfc.svg')}}" alt="">
                                        </span>
                                        <h4>NFC technology</h4>
                                        <p>NFC technology implemented - you buy the chip once and use it for years!</p>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                                    <div class="business-user-box">
                                        <span class="business-user-img">
                                            <img class="img-block" src="{{url('image/qr.svg')}}" alt="">
                                        </span>
                                        <h4>QR code</h4>
                                        <p>QR code included to cover the 10% of non-NFC enabled devices.</p>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                                    <div class="business-user-box">
                                        <span class="business-user-img">
                                            <img class="img-block" src="{{url('image/real-time.svg')}}" alt="">
                                        </span>
                                        <h4>Real Time</h4>
                                        <p>Change business information in real time and get real time statistics!</p>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                                    <div class="business-user-box">
                                        <span class="business-user-img">
                                            <img class="img-block" src="{{url('image/inovation.svg')}}" alt="">
                                        </span>
                                        <h4>Innovation</h4>
                                        <p>Use new technology to attract innovative and open-minded customers.</p>
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

<section class="step-sec pt-50px pb-50px calka calka4a" id="stepsection">
    <span class="colka3"><img class="img-block" src="{{url('image/colka3.png')}}" alt=""></span>
    <span class="colka4"><img class="img-block" src="{{url('image/colka4.png')}}" alt=""></span>
    <div class="container-fluid p-h-60">
        <div class="row">
            <div class="col-12">
                <div class="default-sec-head max-wd">
                    <h3>Steps</h3>
                    <p>{{@$settings->step}}</p>
                </div>
                <div class="step-wrap">
                    <div class="step-wrap-list d-flex flex-wrap">
                        <div class="step-wrap-list-box">
                            <h4 class="sameheigthHead">Pick your plan</h4>
                            <span class="step-img">
                                <img class="img-block" src="{{url('image/step1-img.png')}}" alt="">
                            </span>
                            <p class="sameheigthtext">Choose one of the three plans that suits you</p>
                            <a href="#" class="lern-btn">Learn more</a>
                        </div>
                        <div class="step-wrap-list-box">
                            <h4 class="sameheigthHead">Pick your product to engage</h4>
                            <span class="step-img">
                                <img class="img-block" src="{{url('image/step2-img.png')}}" alt="">
                            </span>
                            <p class="sameheigthtext">Create your promotion strategy</p>
                            <a href="#" class="lern-btn">Learn more</a>
                        </div>
                        <div class="step-wrap-list-box">
                            <h4 class="sameheigthHead">Create your page</h4>
                            <span class="step-img">
                                <img class="img-block" src="{{url('image/step3-img.png')}}" alt="">
                            </span>
                            <p class="sameheigthtext">You can create your own page to promote your business</p>
                            <a href="#" class="lern-btn">Learn more</a>
                        </div>
                        <div class="step-wrap-list-box">
                            <h4 class="sameheigthHead">Engage with your audience</h4>
                            <span class="step-img">
                                <img class="img-block" src="{{url('image/step4-img.png')}}" alt="">
                            </span>
                            <p class="sameheigthtext">Communicate with the audience to increase performance</p>
                            <a href="#" class="lern-btn">Learn more</a>
                        </div>
                        <div class="step-wrap-list-box">
                            <h4 class="sameheigthHead">View statistics</h4>
                            <span class="step-img">
                                <img class="img-block" src="{{url('image/step5-img.png')}}" alt="">
                            </span>
                            <p class="sameheigthtext">View statistics and analyze the performance of your pages</p>
                            <a href="#" class="lern-btn">Learn more</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="plan-sec pt-50px pb-50px calka" id="plansection">
    <span class="colka2"><img class="img-block" src="{{url('image/colka2.png')}}" alt=""></span>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-12">
                        <div class="default-sec-head max-wd">
                            <h3>Plans</h3>
                            <p>{{@$settings->plan}}</p>
                        </div>
                    </div>
                    @if (count($plans) > 0 )
                        @foreach ($plans as $key=>$plan)
                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="home-plan-box {{$key == 1 ? 'plan-basic' : ''}} {{$key == 2 ? 'plan-all-in' : ''}}">
                                    <h4>{{@$plan->name}}</h4>
                                    <p>{{@$plan->description}}</p>
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
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<section class="faq-sec faq-lft-colka" id="faqsection">
    <span class="faq-lft"><img class="img-block" src="{{url('image/feq-lft.png')}}" alt=""></span>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="default-sec-head-white">
                    <h3>FAQ</h3>
                </div>
            </div>
            @if(count($faqs) > 0)
            <div class="col-12">
                <div class="home-faq">
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        @foreach ($faqs as $key=>$faq)
                            <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-heading{{$key}}">
                                <button class="accordion-button {{$key == 0? '': 'collapsed'}}" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{$key}}" aria-expanded="false" aria-controls="flush-collapse{{$key}}">
                                    Where will Ilion be located?
                                </button>
                            </h2>
                            <div id="flush-collapse{{$key}}" class="accordion-collapse collapse {{$key==0? 'show':''}}" aria-labelledby="flush-heading{{$key}}" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <p>We are currently in the process of identifying interested founding members. When at least 100 have made a verbal commitment, the process of negotiating with potential partner nations can begin. There is no financial obligation until the founding members have approved a negotiated deal.</p>
                                </div>
                            </div>
                            </div>
                        @endforeach
                        {{-- <div class="accordion-item">
                          <h2 class="accordion-header" id="flush-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                How and when will it start?
                            </button>
                          </h2>
                          <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <p>We are currently in the process of identifying interested founding members. When at least 100 have made a verbal commitment, the process of negotiating with potential partner nations can begin. There is no financial obligation until the founding members have approved a negotiated deal.</p>
                            </div>
                          </div>
                        </div>
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="flush-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                How much money is needed?
                            </button>
                          </h2>
                          <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <p>We are currently in the process of identifying interested founding members. When at least 100 have made a verbal commitment, the process of negotiating with potential partner nations can begin. There is no financial obligation until the founding members have approved a negotiated deal.</p>
                            </div>
                          </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingFour">
                              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                                  How much money is needed?
                              </button>
                            </h2>
                            <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <p>We are currently in the process of identifying interested founding members. When at least 100 have made a verbal commitment, the process of negotiating with potential partner nations can begin. There is no financial obligation until the founding members have approved a negotiated deal.</p>
                                </div>
                            </div>
                          </div>
                      </div> --}}
                </div>
            </div>
            @endif
        </div>
    </div>
</section>

<section class="touch-sec touch-rt-colka pb-50px" id="contactsection">
    <span class="touch-rt"><img class="img-block" src="{{url('image/touch-rt.png')}}" alt=""></span>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="default-sec-head-white">
                    <h3>We are in touch</h3>
                </div>
            </div>
        </div>
        <div class="row align-items-end">
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="contact-details">
                    <ul>
                        <li>
                            <h6>Phone</h6>
                            <p><a href="tel:(209) 555-0104">(209) 555-0104</a></p>
                        </li>
                        <li>
                            <h6>E-mail</h6>
                            <p><a href="mail:willie.jennings@example.com">willie.jennings@example.com</a></p>
                        </li>
                        <li>
                            <h6>Address</h6>
                            <p>5960 Elgin St undefined Toledo, Louisiana 54105 United States</p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                <form action="" method="GET"  id="contact_us">
                    @csrf
                    <div class="contact-form">
                        <div class="input-home">
                            <input type="text" class="form-control input-home-style" placeholder="Your name" name="name" value="">
                           
                        </div>
                        <div class="input-home">
                            <input type="text" class="form-control input-home-style" placeholder="Phone" name="phone" value="">
                            
                        </div>
                        <div class="input-home">
                            <input type="text" class="form-control input-home-style" placeholder="E-mail" name="email" value="">
                           
                        </div>
                        <div class="home-contact">
                            <button type="submit"  class="home-contact-btn">Contact us</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@include('includes.footer')

@endsection
@push('scripts')
<script>
    $(document).ready(function () {
        var head = 0;
        $('.sameheigthHead').each(function () {
            if ($(this).outerHeight() >= head) {
                head = $(this).outerHeight();
            }
        });
        $('.sameheigthHead').css({
            'min-height': head
        });
        var text = 0;
        $('.sameheigthtext').each(function () {
            if ($(this).outerHeight() >= text) {
                text = $(this).outerHeight();
            }
        });
        $('.sameheigthtext').css({
            'min-height': text
        });

        //Contuct Us
        $( "#contact_us").validate({
            rules: {
                name: {
                    required: true,
                },
                phone: {
                    required: false,
                    digits: true
                },
                email: {
                    required:true,
                    email: true,
                    //regex: /^\b[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i
                }
            },

            submitHandler: function (form) {
                $.ajax({
                    type: "POST",
                    url: "{{route('contact_us')}}",
                    data: $(form).serialize(),
                    success: function () {
                        $(form).html("<div id='message'></div>");
                        $('#message').html("<h2>Thank you for getting in touch!</h2>")
                        
                    }
                });
                return false; // required to block normal submit since you used ajax
            }
        });
    });
    
    $(document).on('click', 'a[href^="#"]', function (event) {
        var headerheight = $(".start-header").outerHeight();
        event.preventDefault();
        $('html, body').animate({
            scrollTop: $($.attr(this, 'href')).offset().top-headerheight
        }, 0);
    });
    
</script>
@endpush