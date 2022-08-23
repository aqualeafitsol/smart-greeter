<div class="col-profile-lft dasb_menu">
    <div class="dasboard-res-menu">
        <button type="button" class="das-res-menu-btn menu_btn">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </div>
    <div class="profile-lft-wrap lft_wrap">
        <button type="button" class="cls-menu cls_menu"><i class="far fa-times-circle"></i></button>
        <div class="black-box lft-black-box lft-box-gap">
            <div class="profile-img-wrap">
                <span class="profile-pic"><img class="img-block" src="{{ Auth::user()->profile_image ? url('image/profile_image/'.Auth::user()->profile_image) : url('image/avatar.jpg')}}" alt=""></span>
                <h4>{{Auth::user()->name}}</h4>
            </div>
            <div class="user-menu-list">
                <ul>
                    <li>
                        <a href="{{route('dashboard')}}" class="{{ (request()->is('dashboard')) ? 'active' : '' }}">
                            <span class="menu-list-icon"><img class="img-block" src="{{url('image/dashboard.svg')}}" alt=""></span>dashboard
                        </a>
                    </li>
                    {{-- <li class="sub_menu {{  Request::segment(1)=='analytics' ? 'sub-menu-open' : '' }}">
                        <a href="javascript:;" class="{{  Request::segment(1)=='analytics' ? 'active' : '' }}">
                            <span class="menu-list-icon"><img class="img-block" src="{{url('image/analytics.svg')}}" alt=""></span>analytics
                            <i class="fas fa-caret-down sub-menu-icon"></i>
                        </a>
                        <ul class="submenu-list">
                            <li><a class="{{ (request()->is('analytics/basic')) ? 'active' : '' }}" href="{{route('analytics.basic')}}">basic</a></li>
                            <li><a href="#">pro</a></li>
                        </ul>
                    </li> --}}

                    {{-- <li class="sub_menu {{  Request::segment(1)=='sticker' ? 'sub-menu-open' : '' }}">
                        <a href="javascript:;" class="{{  Request::segment(1)=='sticker' ? 'active' : '' }}">
                            <span class="menu-list-icon"><img class="img-block" src="{{url('image/analytics.svg')}}" alt=""></span>sticker
                            <i class="fas fa-caret-down sub-menu-icon"></i>
                        </a>
                        <ul class="submenu-list">
                            <li><a class="{{ (request()->is('sticker/add')) ? 'active' : '' }}" href="{{route('user.sticker.add')}}">Add</a></li>
                            <li><a class="{{ (request()->is('sticker/list')) ? 'active' : '' }}" href="{{route('user.sticker.list')}}">List</a></li>
                        </ul>
                    </li> --}}
                    {{-- <li>
                        <a href="{{route('user.sticker.list')}}" class="{{ Request::segment(1)=='sticker' ? 'active' : '' }}">
                            <span class="menu-list-icon"><img class="img-block" src="{{url('image/analytics.svg')}}" alt=""></span>sticker
                        </a>
                    </li> --}}
                    <li>
                        <a href="{{route('user.profile.edit')}}" class="{{ (request()->is('profile/edit')) ? 'active' : '' }}">
                            <span class="menu-list-icon"><img class="img-block" src="{{url('image/profile.svg')}}" alt=""></span>edit profile
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="menu-list-icon"><img class="img-block" src="{{url('image/message.svg')}}" alt=""></span>messages
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="black-box lft-black-box lft-box-gap noti-none">
            <div class="user-notification">
                <h4>notification</h4>
                <ul>
                    {{-- <li><a href="#">Order number 543565454</a></li>
                    <li><a href="#">Check order payment</a></li>
                    <li><a href="#">Confirm your mail</a></li>
                    <li><a href="#" class="seen">Put your profile photo</a></li>
                    <li><a href="#" class="seen">Please enter your location</a></li> --}}
                </ul>
            </div>
        </div>
        {{-- <div class="blue-box lft-deepnevy-blue-box lft-box-gap">
            <div class="user-visitor">
                <p>Today, May 20</p>
                <span class="visitor-bar"><img class="img-block" src="{{url('image/visits.png')}}" alt=""></span>
            </div>
        </div> --}}
    </div>
</div>