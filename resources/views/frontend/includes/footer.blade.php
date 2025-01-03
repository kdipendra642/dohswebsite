<footer id="footer">
   <!-- style="
background-color: #1b52a4 !important;
background-image: url({{asset('assets/frontend/uploads/img/background.png')}})
" -->
    <div class="container">
      <div class="row footer-main">
          <div class="col-sm-3">
            <h4>सम्पर्क ठेगाना</h4>
            <img src="{{ asset('assets/frontend/uploads/img/logo.png')}}" alt="उद्योग विभाग" class="img-fluid float-left" width="60px">
              <h5 class="address text-left">{{$siteSettings->titleOne}}</h5>
              <div class="clear-both"></div>
              <p class="doind-address">
                <i class="fa fa-map-marker"></i> ठेगाना: {{$siteSettings->address}}<br>
                <i class="fa fa-phone"></i> फोन नं.: {{$siteSettings->address}}<br>
                <i class="fa fa-envelope-o"></i> ईमेल: {{$siteSettings->primaryEmail}}<br>
                <i class="fa fa-globe"></i> वेवसाईट: <a href="{{ route('index') }}">{{ route('index') }}</a><br>
            </p>
          </div>
<!-- 
         <div class="col-sm-4">

          </div> -->

                 <!-- <div class="col-sm-2">
            <h4>महानिर्देशक</h4>
                      <img src="uploads/official/Official-20241028045136217.jpg" class="img-fluid img-thumbnail" alt="" style="width:100px; height: 115px;">
                      <h6 class="design-np">राजेश्वर ज्ञवाली</h6>
            <p class="doind-desig">महानिर्देशक</p>
            <p class="doind-desig">फोन नं. +(९७७)-०१-५३६१३०२</p>
          </div>
                  <div class="col-sm-2">
            <h4>सूचना अधिकारी</h4>
                      <img src="uploads/official/Official-20240304214726880.jpg" class="img-fluid img-thumbnail" alt="" style="width:100px; height: 115px;">
                      <h6 class="design-np">अर्जुन सेन ओली</h6>
            <p class="doind-desig">निर्देशक</p>
            <p class="doind-desig">फोन नं. ०१-५३६१११२</p>
          </div> -->

            <div class="col-sm-4">
                <h4>उपयोगी लिङ्कहरु</h4>
                    <ul>
                        @foreach ($importantLinks as $importantLink)
                            <li class="footer-link-np"><a href="{{$importantLink->url}}" target="_banner">{{$importantLink->title}}</a></li>
                        @endforeach
                    </ul>
            </div>

            <div class="col-sm-4">
                <h4>Contact Us</h4>
                <iframe class="gmap_iframe" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=Department of Health Services&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
            </div>
        </div>
      </div>

    <div class="container">
      <div class="row copy">
        <div class="col-sm-5 text-center">&copy; Copyright {{date('Y')}} <strong><a href="#">Department of Health Services</a></strong> All Rights Reserved</div>
        <div class="col-sm-3 text-center footer-social">
          <!-- <a href="#"><i class="fa fa-twitter"></i></a>
          <a href="#"><i class="fa fa-facebook"></i></a>
          <a href="#"><i class="fa fa-envelope-o"></i></a>
          <a href="#"><i class="fa fa-map-marker"></i></a> -->
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
