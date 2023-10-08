<div class="header">
            
    <!-- Logo -->
     <div class="header-left active">
        <a href="index.html" class="logo logo-normal">
            <img src="{{asset('tadmin/assets/img/logo-dp3akb-full.png')}}" style="width: 160px"  alt="">
        </a>
        <a href="index.html" class="logo logo-white">
            <img src="{{asset('tadmin/assets/img/logo-dp3akb-full.png')}}" style="width: 160px"  alt="">
            {{-- <img src="{{asset('tadmin/assets/img/logo-white.png')}}"  alt=""> --}}
        </a>
        <a href="index.html" class="logo-small">
            <img src="{{asset('tadmin/assets/img/logo-small.png')}}"  alt="">
        </a>
        {{-- <a id="toggle_btn" href="javascript:void(0);">
        </a> --}}
    </div>
    <!-- /Logo -->
    
    <a id="mobile_btn" class="mobile_btn" href="#sidebar">
        <span class="bar-icon">
            <span></span>
            <span></span>
            <span></span>
        </span>
    </a>
    
    <!-- Header Menu -->
    <ul class="nav user-menu">
    
        

        <li class="nav-item dropdown has-arrow main-drop">
            <a href="javascript:void(0);" class="dropdown-toggle nav-link userset" data-bs-toggle="dropdown">
                <span class="user-img"><img src="{{asset('tadmin/assets/img/profiles/avator1.jpg')}}" alt="">
                <span class="status online"></span></span>
            </a>
            <div class="dropdown-menu menu-drop-user">
                <div class="profilename">
                    <div class="profileset">
                        <span class="user-img"><img src="{{asset('tadmin/assets/img/profiles/avator1.jpg')}}" alt="">
                        <span class="status online"></span></span>
                        <div class="profilesets">
                            <h6>{{Auth::user()->name}}</h6>
                            <h5>Admin</h5>
                        </div>
                    </div>
                    <a class="dropdown-item pb-0" href="{{route('profile')}}">Change Password</a>
                    <hr class="m-0">
                    <a class="dropdown-item logout pb-0" href="{{route('logout')}}"><img src="{{asset('tadmin/assets/img/icons/log-out.svg')}}" class="me-2'" alt="img">Logout</a>
                </div>
            </div>
        </li>
    </ul>
    <!-- /Header Menu -->
    
    <!-- Mobile Menu -->
    <div class="dropdown mobile-user-menu">
        <a href="javascript:void(0);" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
        <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="{{route('logout')}}">Logout</a>
        </div>
    </div>
    <!-- /Mobile Menu -->
</div>