<aside>
    <div id="sidebar"  class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
            <li>
                <a href="{{ route('dashboard.index') }}" class="active">
                    <i class="fa fa-dashboard"></i>
                    <span>@lang('messages.dashboard')</span>
                </a>
            </li>

            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-book"></i>
                    <span>@lang('messages.content')</span>
                </a>
                <ul class="sub">
                    <li><a  href="{{ route('sliders.index') }}">@lang('messages.sliders')</a></li>
                    <li><a  href="{{ route('tickers.index') }}">@lang('messages.tickers')</a></li>
                    <li><a  href="{{ route('importantlinks.index') }}">@lang('messages.important_links')</a></li>
                    <li><a  href="{{ route('galleries.index') }}">@lang('messages.gallery')</a></li>
                    <li><a  href="{{ route('categories.index') }}">@lang('messages.category')</a></li>
                    <li><a  href="{{ route('posts.index') }}">@lang('messages.posts')</a></li>
                </ul>
            </li>

            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-book"></i>
                    <span>@lang('messages.users')</span>
                </a>
                <ul class="sub">
                    <li><a  href="{{ route('users.index') }}">@lang('messages.users')</a></li>
                    <li><a  href="{{ route('staffs.index') }}">@lang('messages.staffs')</a></li>
                    <li><a  href="{{ route('messages.index') }}">@lang('messages.message')</a></li>
                </ul>
            </li>

            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-book"></i>
                    <span>@lang('messages.settings')</span>
                </a>
                <ul class="sub">
                    <li><a  href="{{ route('sitesettings.index') }}">@lang('messages.site_settings')</a></li>
                    <li><a  href="{{ route('setting.menu') }}">@lang('messages.menu')</a></li>
                </ul>
            </li>

        </ul>
    </div>
</aside>
