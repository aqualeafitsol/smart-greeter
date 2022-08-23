<a class="scrollup" href="javascript:void(0);" aria-label="Scroll to top"><i class="fas fa-chevron-up"></i></a>
<header class="menu-header site-header-main start-style start-header">
    <div class="topHeader">
        <div class="container-fluid p-h-60">
            <div class="row justify-content-between align-items-center">
                <div class="logo">
                    <a href="{{route('home')}}">
                        <img class="img-block" src="{{url('image/logo.png')}}" alt="">
                    </a>
                </div>
                <div class="col">
                    <div class="navArea d-flex justify-content-center align-items-center">
                        <nav id="res_nav" class="navigation">
                            <button id="menu_res" class="menu-responsive">
                                <span></span>
                                <span></span>
                                <span></span>
                            </button>

                            <ul class="d-flex justify-content-between">
                                <li class="{{ (request()->is('/')) ? 'active' : '' }}">
                                    <a href="{{route('home')}}">home</a> 
                                </li>
                                <li>
                                    <a href="#usersection" class="{{ (request()->is('#usersection')) ? 'active' : '' }}">what is in it for you?</a>
                                </li>
                                <li>
                                    <a href="#contactsection" class="{{ (request()->is('/#contactsection')) ? 'active' : '' }}">contact</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="login-area">
                    @if (Auth::check())
                        <div class="after-login-wrap position-relative">
                            <div class="after-login d-flex align-items-center">
                                <span class="user-img">
                                    <img class="img-block" src="{{ Auth::user()->profile_image ? url('image/profile_image/'.Auth::user()->profile_image) : url('image/avatar.jpg')}}" alt="">
                                </span>
                                <h5>{{Auth::user()->name}}</h5>
                                <span class="after-login-icon"><i class="fas fa-angle-down"></i></span>
                            </div>
                            <div class="after-login-menu-wrap">
                                <ul>
                                    <li><a href="{{route('dashboard')}}">dashboard</a></li>
                                    <li><a href="{{route('logout')}}">logout</a></li>
                                </ul>
                            </div>
                        </div>
                    @else
                        <a href="{{route('login')}}" class="login-btn">login</a>
                    @endif  
                </div>
            </div>
        </div>
    </div>
</header>
<!-- lnk-cart -->
@push('scripts')
<script>
$(document).ready(function(){
    
});
</script>
@endpush