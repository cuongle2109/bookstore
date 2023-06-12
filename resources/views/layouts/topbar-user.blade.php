<div class="background--topbar-user">
    <div class="container">
        <div class="block-topbar-user">
            <div style="font-size: 30px; letter-spacing: 10px">CBOOK</div>
{{--            <img src="{{asset('storage/images/logo.svg')}}" alt="">--}}
            {{--            <div class="block-topbar-user__logo">--}}
            {{--                <img src="/storage/images/logo.png" alt="logo" class="img img-fluid">--}}
            {{--            </div>--}}
            <div class="block-topbar-user__profile">
                @if(Auth::user())
                    <div class="dropdown">
                        <a href="javascript:void(0)" class="nav-link dropdown-toggle" id="dropdownProfileTopbar"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownProfileTopbar">
                            <li><a class="dropdown-item" href="{{ route('mypage.profile.index') }}">Hồ sơ</a></li>
                            <li><a class="dropdown-item" href="{{ route('signout') }}">Đăng xuất</a></li>
                        </ul>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="nav-link">Login</a>
                    <a href="{{ route('register-user') }}" class="nav-link">Register</a>
                @endif
            </div>
        </div>
    </div>
</div>
