@php
    $public_menu = Menu::getByName('MasterNavigation');
@endphp

<header id="header" class="">
    <div class="container">
      <nav class="main-nav float-left d-none d-lg-block">

        @if($public_menu)

        <ul class="nav-np">
            <li class="active">
                <a href="{{ route('index') }}"><i class="fa fa-home fa-lg"></i></a>
            </li>
            @foreach($public_menu as $menu)
                <li class="@if( $menu['child'] ) drop-down @endif"><a href="@if( $menu['child'] ) javascript:; @else {{ $menu['link'] }} @endif" target="{{ $menu['target'] }}" >{{ $menu['label'] }}</a></li>
            @if( $menu['child'] )
                <ul>
                    @foreach( $menu['child'] as $child )
                  <li><a href="{{ $child['link'] }}" target="{{ $child['target'] }}" >{{ $child['label'] }}</a></li>
                  @endforeach
                </ul>
            @endif

            @endforeach
        </ul>

        @endif

      </nav>
    </div>
  </header>
