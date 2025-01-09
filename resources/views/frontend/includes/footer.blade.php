<footer id="footer">

    <div class="container">
      <div class="row footer-main">
          <div class="col-sm-3">
            <h4>@lang('messages.contact_address')</h4>
              <img src="{{ asset('assets/frontend/uploads/img/logo.png')}}" alt="{{$siteSettings->titleThree}}" class="img-fluid float-left" >
              @if ($currentLocale == 'en')
              <h5 class="address text-left">{{$siteSettings->titleOne}}</h5>
              <p class="text-left">{{$siteSettings->titleTwo}}</p>
              <p class="address text-left">{{$siteSettings->titleThree}}</p>
              <p class="address text-left">{{$siteSettings->titleFour}}</p>
              @else
              <h5 class="address text-left">{{$siteSettings->titleOne_nep}}</h5>
              <p class="text-left">{{$siteSettings->titleTwo_nep}}</p>
              <p class="address text-left">{{$siteSettings->titleThree_nep}}</p>
              <p class="address text-left">{{$siteSettings->titleFour_nep}}</p>
              @endif
              <div class="clear-both"></div>
              <p class="doind-address">
                <i class="fa fa-map-marker"></i> @lang('messages.address') @if ($currentLocale == 'en') {{$siteSettings->address}} @else {{$siteSettings->address_nep}} @endif<br>
                <i class="fa fa-phone"></i> @lang('messages.contact_number') {{$siteSettings->primaryContact}}, {{$siteSettings->secondaryContact}}<br>
                <i class="fa fa-envelope-o"></i> @lang('messages.e_mail') {{$siteSettings->primaryEmail}}, {{$siteSettings->secondaryEmail}}<br>
                <i class="fa fa-globe"></i> @lang('messages.website') <a href="{{ route('index') }}">{{ route('index') }}</a><br>
            </p>
          </div>
            <div class="col-sm-4">
                <h4>@lang('messages.useful_links')</h4>
                    <ul>
                        @foreach ($importantLinks as $importantLink)
                          <li class="footer-link-np"><a href="{{$importantLink->url}}" target="_banner">{{$importantLink->title}}</a></li>
                        @endforeach
                    </ul>
            </div>

            <div class="col-sm-4">
                <h4>@lang('messages.contact_us')</h4>
                <iframe class="gmap_iframe" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=Department of Health Services&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
            </div>
        </div>
      </div>

    <div class="container">
      <div class="row copy">
        <div class="col-sm-5 text-center">&copy; Copyright {{date('Y')}} <strong><a href="#">Department of Health Services</a></strong> All Rights Reserved</div>
        <div class="col-sm-3 text-center footer-social">
          <span> 
            Response Time 
            <b>
              {{ round(microtime(true) - LARAVEL_START, 3) }}
            </b> Sec
          </span>
          <span> 
            Memory Usage 
            <b>
              {{ number_format(memory_get_usage() / 1024, 2) }}
            </b> KB
          </span>
        </div>
        <div class="col-sm-4 text-center">Designed & Developed by <a href="#">: DOHS</a></div>
      </div>
    </div>
  </footer>
