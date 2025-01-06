@extends('frontend.layout.master')
@section('mainContent')

    <section id="flash" class="wow fadeInUp">
        <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-2 col-lg-1 news-tag">@lang('messages.news')</div>
                <div class="col-sm-12 col-md-10 col-lg-10 news">
                    <div class="owl-carousel flash-caresol">
                        @foreach ($getHomePageData['tickers'] as $tickers)
                        <a href="{{ route('single.tickers',$tickers->slug) }}">
                            {{$tickers->title}}
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section id="slider">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-sm-12 slider-margin" style="padding-left:0px; margin-left:0px;">
                    <div class="wow fadeInUp image-slider" data-wow-delay="0.2s">
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                @php
                                    $i = 0;
                                @endphp
                                @foreach ($getHomePageData['sliders'] as $sliders)
                                {{ $i++; }}
                                    <div class="carousel-item {{$i == 1 ? 'active' : ''}}">
                                        <a href="#" class="">
                                            @if ($sliders->getMedia('sliders')->isNotEmpty())
                                                        <img
                                                            src="{{$sliders->getMedia('sliders')->first()->getUrl()}}"
                                                            alt="{{$sliders->title}}"
                                                            class="img-fluid"
                                                            {{-- style="width: 50%; height: 50%;" --}}
                                                        >
                                                    @endif
                                        </a>
                                        <p>{{ $sliders->title}}</p>
                                    </div>
                                @endforeach

                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12 col-xs-12" style="padding:0px; margin:0px;">
                    <div class="wow fadeInUp">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active tabbg" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true" style="width: 100% !important">@lang('messages.information_news')</a>
                                <!-- <a class="nav-item nav-link tabbg" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">कानून / नियमावली</a> -->
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent" style="overflow: hidden;">
                            <div class="tab-pane fade show active border-tab" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" >
                                <ul>
                                     @foreach ($getHomePageData['informationRelatedNews'] as $informationRelatedNews)
                                     <li>
                                        <a href="{{ route('posts.single', $informationRelatedNews->slug) }}" title="{{$informationRelatedNews->title}}">{{$informationRelatedNews->title}}</a>
                                    </li>
                                     @endforeach

                                    <span class="float-right more"><a href="{{ route('subcategory.post', App\Enums\PostSubCategoryTypeEnum::INFORMATION_NEWS->value) }}">विभागका सुचनाहरु >></a></span>
                                    <span class="clearfix"></span>
                                </ul>
                            </div>
                            <!-- <div class="tab-pane fade border-tab" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                <ul>
                                    <li>
                                        <a href="detail/269.html" title="औद्योगिक व्यवसाय ऐन, २०७६">औद्योगिक व्यवसाय ऐन, २०७६</a>
                                    </li>
                                    <span class="float-right"><a href="laws-and-regulations.html">विभागका सुचनाहरु &raquo;</a></span>
                                    <span class="clearfix"></span>
                                </ul>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- slider trial ends here -->


  <section id="news" class="wow fadeInUp mt-3">
    <div class="container">
        <div class="row">
          <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12 remove-mar-pad">
            <nav>
              <div class="nav nav-tabs" id="news-tab" role="tablist">
                <a class="nav-item nav-link active tabbg" id="nav-suchana-tab"  data-toggle="tab" href="#nav-suchhana" role="tab" aria-controls="nav-suchana" aria-selected="true"> <i class="fa fa-balance-scale fa-lg"></i> <span class="d-none d-md-inline-block">@lang('messages.laws_regulations')</span></a>
                <a class="nav-item nav-link tabbg" id="nav-namunakanun-tab"  data-toggle="tab" href="#nav-namunakanun" role="tab" aria-controls="nav-namunakanun" aria-selected="true"><i class="fa fa-list-ul fa-lg"></i> <span class="d-none d-md-inline-block">@lang('messages.tender_notice')</span></a>
                <a class="nav-item nav-link tabbg" id="nav-trainnig-tab" data-toggle="tab" href="#nav-trainnig" role="tab" aria-controls="nav-traninnig" aria-selected="false"><i class="fa fa-book fa-lg"></i> <span class="d-none d-md-inline-block">@lang('messages.publication')</span></a>
                <!-- <a class="nav-item nav-link tabbg" id="nav-publication-tab" data-toggle="tab" href="#nav-publication" role="tab" aria-controls="nav-publication" aria-selected="false"><i class="fa fa-book fa-lg"></i> <span class="d-none d-md-inline-block">प्रकाशन</span></a> -->
              </div>
            </nav>
            <div class="tab-content" id="nav-tab1">

              <div class="tab-pane fade show active border-tab" id="nav-suchhana" role="tabpanel" aria-labelledby="nav-suchana-tab">
                <ul>
                    @foreach ($getHomePageData['lawRelatedNews'] as $lawRelatedNews)
                    <li>
                        <span class="fa fa-thumb-tack"></span>
                        <a href="{{ route('posts.single', $lawRelatedNews->slug) }}" title="{{$lawRelatedNews->title}}" target="_blank">
                            {{$lawRelatedNews->title}}
                        </a>
                        <i>
                            <small>
                            प्रकाशित मिति {{ Anuzpandey\LaravelNepaliDate\LaravelNepaliDate::from($lawRelatedNews->created_at->format('Y-m-d'))
                            ->toNepaliDate(format: 'D, j F Y')}}
                            </small>
                        </i>
                    </li>
                    @endforeach
                  <span class="float-right more"><a href="{{ route('subcategory.post', App\Enums\PostSubCategoryTypeEnum::LAWS_REGULATION->value) }}" class="btn btn-sm btn-danger">थप समाग्री >></a></span>
                  <span class="clearfix"></span>
                </ul>
              </div>

              <div class="tab-pane fade border-tab" id="nav-namunakanun" role="tabpanel" aria-labelledby="nav-namunakanun-tab">
                <ul>
                    @foreach ($getHomePageData['tenderRelatedNews'] as $tenderRelatedNews)
                    <li>
                        <span class="fa fa-thumb-tack"></span>
                        <a href="{{ route('posts.single', $tenderRelatedNews->slug) }}" title="{{$tenderRelatedNews->title}}" target="_blank">
                            {{$tenderRelatedNews->title}}
                        </a>
                        <i>
                            <small>
                            प्रकाशित मिति {{ Anuzpandey\LaravelNepaliDate\LaravelNepaliDate::from($tenderRelatedNews->created_at->format('Y-m-d'))
                            ->toNepaliDate(format: 'D, j F Y')}}
                            </small>
                        </i>
                    </li>
                    @endforeach

                  <span class="float-right more"><a href="{{ route('subcategory.post', App\Enums\PostSubCategoryTypeEnum::TENDER_NOTICE->value) }}" class="btn btn-sm btn-danger">थप समाग्री >></a></span>
                  <span class="clearfix"></span>
                </ul>
              </div>

              <div class="tab-pane fade border-tab" id="nav-trainnig" role="tabpanel" aria-labelledby="nav-trainnig-tab">
                <ul>
                @foreach ($getHomePageData['publicationRelatedNews'] as $publicationRelatedNews)
                    <li>
                        <span class="fa fa-thumb-tack"></span>
                        <a href="{{ route('posts.single', $publicationRelatedNews->slug) }}" title="{{$publicationRelatedNews->title}}" target="_blank">
                            {{$publicationRelatedNews->title}}
                        </a>
                        <i>
                            <small>
                            प्रकाशित मिति {{ Anuzpandey\LaravelNepaliDate\LaravelNepaliDate::from($publicationRelatedNews->created_at->format('Y-m-d'))
                            ->toNepaliDate(format: 'D, j F Y')}}
                            </small>
                        </i>
                    </li>
                    @endforeach

                  <span class="float-right more"><a href="{{ route('subcategory.post', App\Enums\PostSubCategoryTypeEnum::PUBLICATION->value) }}" class="btn btn-sm btn-danger">थप समाग्री >></a></span>
                  <span class="clearfix"></span>
                </ul>
              </div>

            </div>

          </div>
          <!--endtab-->
          <!-- official -->
                  <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                    <div class="wow fadeInRight" data-wow-delay="0.2s">
                        @foreach ($getHomePageData['staffs'] as $staffs)
                        <div class="profile-ebox photo-placeholder ">
                            <div class="single-profile">
                                <h5 class="h5">{{$staffs->position}}</h5>
                                <center>
                                    @if ($staffs->getMedia('staffs')->isNotEmpty())
                                        <img
                                        src="{{$staffs->getMedia('staffs')[0]->getUrl()}}"
                                        alt="{{$staffs->name}}"
                                        width="100%"
                                        height="100%"
                                        class="img-fluid img-thumbnail"
                                        title="{{$staffs->name}}"
                                        >
                                        @else
                                        <img
                                        src="{{ asset('assets/frontend/uploads/img/user.jpg') }}"
                                        alt="{{$staffs->name}}"
                                        width="122"
                                        class="img-fluid img-thumbnail"
                                        title="{{$staffs->name}}"
                                        >
                                    @endif
                                </center>
                                <p class="h4 mt-1"> {{$staffs->name}} </p>
                            <p class="h6"> <i class="fa fa-phone"></i> {{$staffs->telephone}}</p>
                            <p class="h6"> <i class=" fa fa-envelope"></i> {{$staffs->email}}</p>
                            </div>
                        @endforeach
            </div>
          </div>
                  <!-- end official -->
        </div>
    </div>
  </section>

    <section id="all_notice" class="wow fadeInUp d-sm-block d-none mt-3">
        <div class="container bibhag pl-2">
            <h4 class="text-center pt-3 mb-0 pb-0 imp-link">@lang('messages.useful_links')</h4>
            <hr>
        </div>
        <div class="container">
            <div class="row">
                @foreach ($getHomePageData['importantLinks'] as $importantLinks)
                    <div class="col-md-2 all-notice">
                        <a href="{{ $importantLinks->url }}" target="_banner">
                            <img src="{{ asset('assets/frontend/uploads/img/logo.png')}}" alt="{{$importantLinks->title}}">
                            <h2 class="wow fadeInUp">{{$importantLinks->title}} </h2>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <style>
       .gallery-carousel .gallery-img {
            position: relative;
            overflow: hidden;
        }

        .gallery-carousel img {
            width: 100%;
            height: auto;
        }

        .caption {
            position: absolute;
            bottom: 10px;
            left: 10px;
            right: 10px;
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            padding: 5px;
            text-align: center;
            border-radius: 5px;
        }
    </style>
  <section id="gallery" class="wow fadeInUp">
    <div class="container bg-silver" style="padding:0px 0px 6px 8px;">
        <h4 class="text-center pt-3 mb-0 pb-0 imp-link">@lang('messages.gallery')</h4>
        <hr>
        <div class="owl-carousel gallery-carousel">
            @foreach ($getHomePageData['galleries'] as $gallery)
                <div class="gallery-img">
                    <a href="{{ route('gallery', $gallery->slug) }}" title="{{$gallery->title}}">
                        @if ($gallery->getMedia('thumbnail')->isNotEmpty())
                        <img src="{{$gallery->getMedia('thumbnail')->first()->getUrl()}}" class="img-fluid" alt="{{$gallery->title}}">
                        @endif
                    </a>
                    <div class="caption">{{ $gallery->title }}</div> <!-- Caption for the image -->
                </div>
            @endforeach
        </div>
    </div>
</section>

    <script type="text/javascript">
        $(document).ready(function(){
    $('.gallery-carousel').owlCarousel({
        items: 1, // Show one item at a time
        loop: false, // Disable looping
        nav: true, // Show next/prev buttons
        dots: true, // Show dots for navigation
        autoplay: true, // Enable autoplay
        autoplayTimeout: 3000, // Time between transitions
        autoplayHoverPause: true // Pause on mouse hover
    });
});
    </script>
@endsection
