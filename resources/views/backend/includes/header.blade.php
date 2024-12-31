<header class="header white-bg">
    <div class="sidebar-toggle-box">
        <i class="fa fa-bars"></i>
    </div>
    <!--logo start-->
    <a href="{{ route('dashboard.index')}}" class="logo">DO<span>HS</span></a>
    <!--logo end-->
    <div class="top-nav ">
        <!--search & user info start-->
        <ul class="nav pull-right top-menu">
            {{-- <li>
                <input type="text" class="form-control search" placeholder="Search">
            </li> --}}
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
                            {{-- <button type="submit">
                                <i class="fa fa-key"></i> Logout
                            </button> --}}

                            <button type="submit" class="btn btn-transparent text-white">
                                <i class="fa fa-key text-info"></i>
                                 Logout
                            </button>
                        </form>
                        {{-- <a href="{{ route('login.signout') }}"><i class="fa fa-key"></i> Log Out</a> --}}
                    </li>
                </ul>
            </li>
        </ul>
        <!--search & user info end-->
    </div>
</header>
