<header id="header">
    <div class="headerbar">
        <div class="headerbar-left">
            <ul class="header-nav header-nav-options">
                <li class="header-nav-brand">
                    <div class="brand-holder">
                        <a href="{{ route('doctors.dashboard') }}">
                            <span class="text-lg text-bold text-primary">HMS</span>
                        </a>
                    </div>
                </li>
                <li>
                    <a class="btn btn-icon-toggle menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
                        <i class="fa fa-bars"></i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="headerbar-right">
            <ul class="header-nav header-nav-options">

                <ul class="header-nav header-nav-profile">
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle ink-reaction" data-toggle="dropdown">
                            <img src="{{ asset('img/avatar11.jpg?1403934956') }}" alt="" />
                            <span class="profile-info">
                                @if (!is_null(Auth::guard('web')->user()))
                                    {!! Auth::guard('web')->user()->name !!}
                                @elseif (!is_null(Auth::guard('doctor')->user()))
                                    {!! Auth::guard('doctor')->user()->name !!}
                                @endif
                                <small>{!! !is_null(Auth::guard('web')->user()) ? Auth::guard('web')->user()->user_designation->name : '' !!}</small>
                            </span>
                        </a>
                        <ul class="dropdown-menu animation-dock">
                            <li><a href="{{ route('doctors.profile') }}"><i
                                        class="fa fa-fw fa-user text-primary"></i>Profile</a></li>
                            <li><a
                                    href="@if (!is_null(Auth::guard('web')->user())) {{ route('user.logout') }} @elseif(!is_null(Auth::guard('doctor')->user())) {{ route('doctors.logout') }} @endif"><i
                                        class="fa fa-fw fa-power-off text-danger"></i>
                                    Logout</a></li>
                        </ul>
                    </li>
                </ul>
        </div>
</header>
