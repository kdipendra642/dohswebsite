@php
    $public_menu = Menu::getByName('MasterNavigation');
    $public_menu_nep = Menu::getByName('MasterNavigationNep');

    $currentLocale = session('locale', app()->getLocale());

@endphp
<style>
    .main-nav {
        position: relative;
        /* font-family: Arial, sans-serif; */
    }

    .main-nav ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    /* Top-level menu items */
    .main-nav > ul {
        display: flex; /* Horizontally align top-level items */
        justify-content: start;
        align-items: center;
    }

    .main-nav > ul > li {
        position: relative;
        /* margin-right: 15px; */
    }

    main-nav > ul > li > a {
    display: block;
    padding: 10px 15px;
    /* text-decoration: none; */
    /* background-color: #f8f8f8; */
    /* color: #333; */
    /* border: 1px solid #ddd; */
    /* border-radius: 5px; */
    transition: background-color 0.3s, color 0.3s;
}

    .main-nav > ul > li > a:hover {
        background-color: #e0e0e0;
        color: #000;
    }

    /* Nested submenu styles */
    .main-nav ul ul {
        display: none;
        position: absolute;
        /* top: 100%; */
        /* left: 0; */
        /* background-color: white; */
        /* padding: 10px; */
        /* box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); */
        border-radius: 5px;
        z-index: 1000;
    }

    .main-nav li:hover > ul {
        display: block; /* Show submenu on hover */
    }

    .main-nav ul ul li {
        position: relative; /* To allow further nesting */
    }

    .main-nav ul ul li a {
        display: block;
    /* padding: 10px 20px; */
    text-decoration: none;
    background-color: #fff;
    color: #555;
    /* border-radius: 5px; */
    transition: background-color 0.3s, color 0.3s;
    }

    .main-nav ul ul li a:hover {
        background-color: #f0f0f0;
        color: #000;
    }

    /* For deeper nested levels */
    .main-nav ul ul ul {
        top: 0; /* Align deeper levels with the parent menu item */
        left: 100%; /* Display next to the parent submenu */
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .main-nav > ul {
            flex-direction: column; /* Stack items vertically on smaller screens */
        }

        .main-nav ul ul {
            position: static; /* Stack nested menus below parents */
            padding-left: 20px;
        }
    }
</style>



<header id="header" class="">
    <div class="container">

    <nav class="main-nav float-left d-none d-lg-block">
        <ul class="nav-np">
            <li>
                <a href="{{ route('index') }}"><i class="fa fa-home fa-lg"></i></a>
            </li>
            @if($currentLocale == 'en')

            @if($public_menu)
                @foreach($public_menu as $menu)
                <li>
                    <a href="{{ $menu['link'] }}" target="{{ $menu['target'] }}">
                    {{ $menu['label'] }}
                    @if($menu['child'])
                        <span class="fa fa-caret-down">  </span>
                    @endif
                    </a>
                    @if($menu['child'])
                    <ul>
                        @foreach($menu['child'] as $child)
                        <li>
                            <a href="{{ $child['link'] }}" target="{{ $child['target'] }}">
                                {{ $child['label'] }}
                                @if($child['child'])
                                    <span class="fa fa-angle-right"> </span>
                                @endif
                            </a>
                            @if($child['child'])
                            <ul>
                                @foreach($child['child'] as $shubchild)
                                <li>
                                    <a href="{{ $shubchild['link'] }}" target="{{ $shubchild['target'] }}">{{ $shubchild['label'] }}</a>
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
                                </li>
                                @endforeach
                            </ul>
                            @endif
                        </li>
                        @endforeach
                    </ul>
                    @endif
                </li>
                @endforeach
            @endif

            @else

            @if($public_menu_nep)
                @foreach($public_menu_nep as $menu)
                <li>
                    <a href="{{ $menu['link'] }}" target="{{ $menu['target'] }}">
                    {{ $menu['label'] }}
                    @if($menu['child'])
                        <span class="fa fa-caret-down">  </span>
                    @endif
                    </a>
                    @if($menu['child'])
                    <ul>
                        @foreach($menu['child'] as $child)
                        <li>
                            <a href="{{ $child['link'] }}" target="{{ $child['target'] }}">
                                {{ $child['label'] }}
                                @if($child['child'])
                                    <span class="fa fa-angle-right"> </span>
                                @endif
                            </a>
                            @if($child['child'])
                            <ul>
                                @foreach($child['child'] as $shubchild)
                                <li>
                                    <a href="{{ $shubchild['link'] }}" target="{{ $shubchild['target'] }}">{{ $shubchild['label'] }}</a>
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
                                </li>
                                @endforeach
                            </ul>
                            @endif
                        </li>
                        @endforeach
                    </ul>
                    @endif
                </li>
                @endforeach
            @endif

            @endif


        </ul>
    </nav>

    </div>
  </header>
