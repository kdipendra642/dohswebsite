<header class="header white-bg">
    <div class="sidebar-toggle-box">
        <i class="fa fa-bars"></i>
    </div>
    <!--logo start-->
    <a href="{{ route('dashboard.index')}}" class="logo">Department of <span>Health Service</span></a>
    <!--logo end-->
    <div class="top-nav ">
        <!--search & user info start-->
        <ul class="nav pull-left top-menu" style="padding-top: 5px;">
            <li><span><a href="{{ route('index') }}" target="_blank" class="text-primary text-sm"><i class="fa fa-globe"></i> Go To Website</a></span></li>
            <li>
                <strong>
                    <span>Date (A.D.): {{now()->format('Y-m-d')}}</span>
                    <span>Date (B.S.): {{
                        Anuzpandey\LaravelNepaliDate\LaravelNepaliDate::from(now()->format('Y-m-d'))
                            ->toNepaliDate(format: 'D, j F Y', locale: 'en')}}
                    </span>
                </strong>
              
            </li>
            

        </ul>
        <p>
        </p>

        <ul class="nav pull-right top-menu">
            <!-- user login dropdown start-->
            <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <span class="username">{{ auth()->user()->name}}</span>
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu extended logout dropdown-menu-right">
                    <div class="log-arrow-up"></div>
                    <li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li>
                    <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                    <li>
                        <form action="{{route('login.signout')}}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-transparent text-white">
                                <i class="fa fa-key text-white"></i>
                                 Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
        <!--search & user info end-->
    </div>
</header>
