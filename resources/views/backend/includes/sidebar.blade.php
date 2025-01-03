<aside>
    <div id="sidebar"  class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
            <li>
                <a href="{{ route('dashboard.index') }}" class="active">
                    <i class="fa fa-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-book"></i>
                    <span>Content</span>
                </a>
                <ul class="sub">
                    <li><a  href="{{ route('sliders.index') }}">Sliders</a></li>
                    <li><a  href="{{ route('tickers.index') }}">Tickers</a></li>
                    <li><a  href="{{ route('importantlinks.index') }}">Important Links</a></li>
                    <li><a  href="{{ route('galleries.index') }}">Gallery</a></li>
                    <li><a  href="{{ route('categories.index') }}">Category</a></li>
                    <li><a  href="{{ route('posts.index') }}">Posts</a></li>
                </ul>
            </li>

            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-book"></i>
                    <span>Users</span>
                </a>
                <ul class="sub">
                    <li><a  href="{{ route('users.index') }}">Users</a></li>
                    <li><a  href="{{ route('staffs.index') }}">Staffs</a></li>
                    <li><a  href="{{ route('messages.index') }}">Message</a></li>
                </ul>
            </li>

            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-book"></i>
                    <span>Settings</span>
                </a>
                <ul class="sub">
                    <li><a  href="{{ route('sitesettings.index') }}">Site Settings</a></li>
                </ul>
            </li>
            
        </ul>
    </div>
</aside>
