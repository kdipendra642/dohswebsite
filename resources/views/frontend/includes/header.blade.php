@php
    $public_menu = Menu::getByName('MasterNavigation');
@endphp

<style>
/* Base styles for the navigation */
.main-nav {
    position: relative; /* Allows absolute positioning of submenus */
}

.main-nav ul {
    list-style: none; /* Remove default list styling */
    padding: 0; /* Remove default padding */
    margin: 0; /* Remove default margin */
}

/* Initially hide all submenus */
.main-nav ul ul {
    display: none; /* Hide all submenus by default */
    position: absolute; /* Position them absolutely */
    left: 0; /* Align to the left of the parent */
    top: 100%; /* Position below the parent */
    width: 100%; /* Make the submenu the same width as the parent li */
    background-color: white; /* Background color for the submenu */
    z-index: 1000; /* Ensure it appears above other elements */
}

/* Show the submenu when hovering over the parent li */
.main-nav li:hover > ul {
    display: block; /* Show the submenu on hover */
}

/* Style for links in the main menu */
.main-nav > ul > li > a {
    display: block; /* Make the links block elements */
    padding: 10px 15px; /* Add padding */
    /* color: black; Text color */
    text-decoration: none; /* Remove underline */
}

/* Hover effect for main menu links */
.main-nav > ul > li > a:hover {
    background-color: #f0f0f0; 
    color: #000 !important; /* Set a darker color on hover */
}

/* Submenu link styles */
.main-nav ul ul li a {
    padding: 10px 15px; /* Adjust padding for submenu links */
    color: black; /* Text color */
    text-decoration: none; /* Remove underline */
}

/* Hover effect for submenu links */
.main-nav ul ul li a:hover {
    background-color: #e0e0e0; /* Change background on hover */
    color: #000 !important; /* Set a darker color on hover */
}

/* Styles for deeper nested menus */
.main-nav ul ul ul {
    left: 100%; /* Position deeper submenus to the right */
    top: 0; /* Align them with the parent */
}

/* Optional: Style for deeper nested submenu links */
.main-nav ul ul ul li a {
    padding: 10px 15px; /* Adjust padding for deeper submenu links */
    color: black; /* Text color */
    text-decoration: none; /* Remove underline */
}

/* Optional: Hover effect for deeper submenu links */
.main-nav ul ul ul li a:hover {
    background-color: #d0d0d0; /* Change background on hover */
    color: black !important; /* Set a darker color on hover */
}

/* Ensure that supporting labels remain visible */
.main-nav ul ul ul li {
    position: relative; /* Ensure proper positioning */
}

</style>

<header id="header" class="">
    <div class="container">

      <nav class="main-nav float-left d-none d-lg-block">
        <ul class="nav-np">
            <li>
                <a href="{{ route('index') }}"><i class="fa fa-home fa-lg"></i></a>
            </li>
            @if($public_menu)

            @foreach($public_menu as $menu)
            <li>
                <a href="{{ $menu['link'] }}" target="{{ $menu['target'] }}">{{ $menu['label'] }}</a>
                @if($menu['child'])
                <ul>
                    @foreach($menu['child'] as $child)
                    <li>
                      <a href="{{ $child['link'] }}" target="{{ $child['target'] }}">{{ $child['label'] }}</a>
                              <!-- starrt -->
                              @if($child['child'])
                              <ul>
                                  @foreach($child['child'] as $shubchild)
                                  <li>
                                    <a href="{{ $shubchild['link'] }}" target="{{ $shubchild['target'] }}">{{ $shubchild['label'] }}</a>
                                    <!-- again subloop -->
                                    @if($shubchild['child'])
                                    <ul>
                                        @foreach($shubchild['child'] as $greatchild)
                                        <li>
                                            <a href="{{ $greatchild['link'] }}" target="{{ $greatchild['target'] }}">
                                                {{ $greatchild['label'] }}
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                    @endif
                                    <!-- again subloop stop -->
                                  </li>
                                  @endforeach
                              </ul>
                              @endif
                              <!-- top -->
                    </li>
                    @endforeach
                </ul>
                @endif
            </li>
            @endforeach
            @endif

        </ul>
      </nav>

    </div>
  </header>
