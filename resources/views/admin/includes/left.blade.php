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
                <span class="profile-pic"><img class="img-block" src="{{ Auth::user()->profile_image ? url('Admin/image/profile_image/'.Auth::user()->profile_image) : url('Admin/image/avatar.jpg')}}" alt=""></span>
                <h4>{{Auth::user()->name}}</h4>
            </div>
            <div class="user-menu-list">
                <ul>
                    <li>
                        <a href="{{route('admin')}}" class="{{ (request()->is('admin/dashboard')) ? 'active' : '' }}">
                            <span class="menu-list-icon"><img class="img-block" src="{{url('Admin/image/dashboard.svg')}}" alt=""></span>dashboard
                        </a>
                    </li>
                    {{-- <li class="sub_menu {{  Request::segment(1)=='analytics' ? 'sub-menu-open' : '' }}">
                        <a href="javascript:;" class="{{  Request::segment(1)=='analytics' ? 'active' : '' }}">
                            <span class="menu-list-icon"><img class="img-block" src="{{url('Admin/image/analytics.svg')}}" alt=""></span>analytics
                            <i class="fas fa-caret-down sub-menu-icon"></i>
                        </a>
                        <ul class="submenu-list">
                            <li><a class="{{ (request()->is('analytics/basic')) ? 'active' : '' }}" href="{{route('analytics.basic')}}">basic</a></li>
                            <li><a href="#">pro</a></li>
                        </ul>
                    </li> --}}

                    {{-- <li class="sub_menu {{  Request::segment(1)=='sticker' ? 'sub-menu-open' : '' }}">
                        <a href="javascript:;" class="{{  Request::segment(1)=='sticker' ? 'active' : '' }}">
                            <span class="menu-list-icon"><img class="img-block" src="{{url('Admin/image/analytics.svg')}}" alt=""></span>sticker
                            <i class="fas fa-caret-down sub-menu-icon"></i>
                        </a>
                        <ul class="submenu-list">
                            <li><a class="{{ (request()->is('sticker/add')) ? 'active' : '' }}" href="{{route('user.sticker.add')}}">Add</a></li>
                            <li><a class="{{ (request()->is('sticker/list')) ? 'active' : '' }}" href="{{route('user.sticker.list')}}">List</a></li>
                        </ul>
                    </li> --}}

                    <li>
                        <a href="{{route('admin.sticker.order')}}" class="{{ (request()->is('admin/order')) ? 'active' : '' }}">
                            <span class="menu-list-icon"><i class="fas fa-box"></i></span>Order
                        </a>
                    </li>
                   
                    {{-- <li>
                        <a href="#" class="{{ (request()->is('profile/edit')) ? 'active' : '' }}">
                            <span class="menu-list-icon"><img class="img-block" src="{{url('Admin/image/profile.svg')}}" alt=""></span>edit profile
                        </a>
                    </li> --}}
                    <li>
                        <a href="#">
                            <span class="menu-list-icon"><img class="img-block" src="{{url('Admin/image/message.svg')}}" alt=""></span>message
                        </a>
                    </li>

                    <li class="sub_menu {{  Request::segment(2)=='plan' ? 'sub-menu-open' : '' }}">
                        <a href="javascript:;" class="{{  Request::segment(2)=='plan' ? 'active' : '' }}">
                            <span class="menu-list-icon"><img class="img-block" src="{{url('Admin/image/analytics.svg')}}" alt=""></span>Plan
                            <i class="fas fa-caret-down sub-menu-icon"></i>
                        </a>
                        <ul class="submenu-list">
                            {{-- <li><a class="{{ (request()->is('admin/plan/subscription/add')) ? 'active' : '' }}" href="{{route('admin.create.plan')}}">Add</a></li> --}}
                            <li><a class="{{ (request()->is('admin/plan/subscription')) ? 'active' : '' }}" href="{{route('admin.plan')}}">List</a></li>
                        </ul>
                    </li>
                    
                    <li class="sub_menu {{  Request::segment(2)=='cms' ? 'sub-menu-open' : '' }}">
                        <a href="javascript:;" class="{{  Request::segment(2)=='cms' ? 'active' : '' }}">
                            <span class="menu-list-icon"><img class="img-block" src="{{url('Admin/image/analytics.svg')}}" alt=""></span>Cms
                            <i class="fas fa-caret-down sub-menu-icon"></i>
                        </a>
                        <ul class="submenu-list">
                            <li><a class="{{ (request()->is('admin/cms/add')) ? 'active' : '' }}" href="{{route('admin.create.cms')}}">Add</a></li>
                            <li><a class="{{ (request()->is('admin/cms')) ? 'active' : '' }}" href="{{route('admin.cms')}}">List</a></li>
                        </ul>
                    </li>
                    
                    <li>
                        <a href="{{route('admin.faq')}}" class="{{ (request()->is('admin/faq*')) ? 'active' : '' }}">
                            <span class="menu-list-icon"><i class="fa fa-question" aria-hidden="true"></i>
                            </span>Faq
                        </a>
                    </li>
                    <li>
                        <a href="{{route('admin.setting.edit',1)}}" class="{{ (request()->is('admin/setting/edit/*')) ? 'active' : '' }}">
                            <span class="menu-list-icon"><i class="fa fa-wrench" aria-hidden="true"></i></span>Settings
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="black-box lft-black-box lft-box-gap noti-none">
            <div class="user-notification">
                <h4>notification</h4>
                <ul>
                    <li><a href="#">Order number 543565454</a></li>
                    <li><a href="#">Check order payment</a></li>
                    <li><a href="#">Confirm your mail</a></li>
                    <li><a href="#" class="seen">Put your profile photo</a></li>
                    <li><a href="#" class="seen">Please enter your location</a></li>
                </ul>
            </div>
        </div>
        <div class="blue-box lft-deepnevy-blue-box lft-box-gap noti-none">
            <div class="user-visitor">
                <p>Today, May 20</p>
                <span class="visitor-bar"><img class="img-block" src="{{url('Admin/image/visits.png')}}" alt=""></span>
            </div>
        </div>
    </div>
</div>