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
            <li><span><a href="{{ route('index') }}" target="_blank" class="text-primary text-sm"><i class="fa fa-globe"></i> @lang('messages.go_to_website')</a></span></li>
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
       
        <div class="btn-group px-4">
            <button type="button" class="btn btn-sm btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Language
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ route('lang.setup', 'en') }}">
                    English 
                    @if (app()->getLocale() == 'en') 
                        <span class="ml-2">&#10003;</span>
                    @endif
                </a>
                <a class="dropdown-item" href="{{ route('lang.setup', 'nep') }}">
                    Nepali 
                    @if (app()->getLocale() == 'nep') 
                        <span class="ml-2">&#10003;</span>
                    @endif
                </a>
            </div>
        </div>
        

        <ul class="nav pull-right top-menu">
       
            <!-- user login dropdown start-->
            <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <span class="username">{{ auth()->user()->name}}</span>
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu extended logout dropdown-menu-right">
                    <div class="log-arrow-up"></div>
                    <li><a href="{{ route('profile') }}"><i class=" fa fa-suitcase"></i>@lang('messages.profile')</a></li>
                    <li><a href="{{ route('sitesettings.index') }}"><i class="fa fa-cog"></i> @lang('messages.settings')</a></li>
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
