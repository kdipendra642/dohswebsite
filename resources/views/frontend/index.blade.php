@extends('frontend.layout.master')
@section('mainContent')

@include('frontend.popups.modal')

    <section id="flash" class="wow fadeInUp">
        <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-2 col-lg-1 news-tag">@lang('messages.news')</div>
                <div class="col-sm-12 col-md-10 col-lg-10 news">
                    <div class="owl-carousel flash-caresol">
                        @foreach ($getHomePageData['tickerRelatedNews'] as $posts)
                        <a href="{{ route('posts.single',$posts->slug) }}">
                            {{$posts->title}}
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
                <!-- Slider Column -->
                <div class="col-lg-8 col-sm-12">
                    <div class="wow fadeInUp image-slider" data-wow-delay="0.2s">
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                @php
                                    $i = 0;
                                @endphp
                                @foreach ($getHomePageData['sliders'] as $galleries)
                                    <span class="d-none">{{ $i++; }}</span>
                                    <div class="carousel-item {{$i == 1 ? 'active' : ''}}">
                                        <a href="{{ route('gallery', $galleries->slug) }}" class="d-block">
                                            @if ($galleries->getMedia('thumbnail')->isNotEmpty())
                                                <img src="{{$galleries->supportingImages[0]->getUrl()}}" 
                                                    src="{{$galleries->getMedia('thumbnail')->first()->getUrl()}}"
                                                    alt="{{$galleries->title}}"
                                                    class="img-fluid w-100 h-300 object-fit-cover">
                                            @else
                                                <img src="{{ asset('assets/frontend/uploads/img/logo.png')}}" 
                                                    alt="{{$galleries->title}}"  
                                                    class="img-fluid w-100 h-300 object-fit-cover">
                                            @endif
                                        </a>
                                        <p class="mt-2">
                                            {{  Illuminate\Support\Str::limit(session('locale') === 'en' ? $galleries->title : ($galleries->title_nep ?? $galleries->title), 125) }}
                                        </p>
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

                <!-- News Column -->
                <div class="col-lg-4 col-sm-12">
                    <div class="wow fadeInUp">
                        <div class="bg-light border">
                            <div class="text-center bg-danger text-white p-2">
                                <h5 class="">@lang('messages.information_news')</h5>
                            </div>
                            <ul style="list-style: disc;">
                                @foreach ($getHomePageData['informationRelatedNews'] as $informationRelatedNews)
                                    <li class="mb-2" style="margin-left: 1rem;">
                                        <a href="{{ route('posts.single', $informationRelatedNews->slug) }}" title="{{$informationRelatedNews->title}}" class="text-decoration-none text-dark">
                                            {{ session('locale') === 'en' ? $informationRelatedNews->title : ($informationRelatedNews->title_nep ?? $informationRelatedNews->title) }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="text-center mb-2">
                                <a href="{{ route('subcategory.post', App\Enums\PostSubCategoryTypeEnum::INFORMATION_NEWS->value) }}" class="text-decoration-none btn text-white" style="background-color: #f77015;">
                                    विभागका सुचनाहरु >>
                                </a>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


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
                <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                    <div class="wow fadeInRight" data-wow-delay="0.2s">
                        @foreach ($getHomePageData['staffs'] as $staffs)
                            <div class="profile-ebox mb-4 shadow-sm p-3 bg-white rounded text-center">
                                <!-- Staff Image -->
                                <div class="mb-3">
                                    @if ($staffs->getMedia('staffs')->isNotEmpty())
                                        <img src="{{$staffs->getMedia('staffs')[0]->getUrl()}}"
                                            alt="{{$staffs->name}}"
                                            class="img-fluid w-50 h-auto"
                                            title="{{$staffs->name}}">
                                    @else
                                        <img src="{{ asset('assets/frontend/uploads/img/user.jpg') }}"
                                            alt="{{$staffs->name}}"
                                            class="img-fluid w-50 h-auto"
                                            title="{{$staffs->name}}">
                                    @endif
                                </div>

                                <!-- Staff Details -->
                                <p class="h5 mb-2 font-weight-bold">{{$staffs->name}}</p>
                                <p class="text-muted mb-2">{{$staffs->position}}</p>

                                <!-- Telephone -->
                                @if($staffs->telephone)
                                    <p class="h6 mb-2">
                                        <i class="fa fa-phone text-primary"></i>
                                        {{$staffs->telephone}}
                                    </p>
                                @endif

                                <!-- Email -->
                                @if($staffs->email)
                                    <p class="h6 mb-0">
                                        <i class="fa fa-envelope text-primary"></i>
                                        {{$staffs->email}}
                                    </p>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- end official -->
            </div>
        </div>
    </section>
  <style>
    .tool-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        position: relative; /* For z-index management */
        overflow: hidden;   /* Prevents overflowing content */
    }

    .tool-card img {
        transition: transform 0.3s ease;
        max-width: 80%;     /* Adjust to fit your design */
        height: auto;
    }

    .tool-card:hover {
        transform: translateY(-10px); /* Lift effect */
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2); /* Shadow effect */
    }

    .tool-card:hover img {
        transform: scale(1.1); /* Slight zoom on image */
    }

    .tool-card p {
        margin-top: 10px;
        transition: color 0.3s ease; /* Smooth color change */
    }

    .tool-card:hover p {
        color: #007bff; /* Change to your preferred hover color */
    }
</style>
    <section id="all_notice" class="wow fadeInUp d-sm-block d-none mt-3">
        <div class="container bibhag pl-2">
            <h4 class="text-center pt-3 mb-0 pb-0 imp-link">@lang('messages.usefultools')</h4>
            <hr>
        </div>
        <div class="container">
            <div class="row">
            @foreach ($getHomePageData['usefulTools'] as $usefulTools)
                <div class="col-md-2 border rounded bg-light text-center pt-3 tool-card">
                    <a href="{{ $usefulTools->url }}" target="_banner">
                        @if ($usefulTools->getMedia('icons')->isNotEmpty())
                            <img src="{{$usefulTools->getMedia('icons')->first()->getUrl()}}" alt="{{$usefulTools->title}}">   
                        @else
                            <img src="{{ asset('assets/frontend/uploads/img/logo.png')}}" alt="{{$usefulTools->title}}">
                        @endif
                        <p class="wow fadeInUp">{{$usefulTools->title}} </p>
                    </a>
                </div>
            @endforeach              
            </div>
        </div>
    </section>

    <br>
    <section id="all_noticeII" class="wow fadeInUp d-sm-block d-none mt-3">
        <div class="container bibhag pl-2">
            <h4 class="text-center pt-3 mb-0 pb-0 imp-link">@lang('messages.video_gallery')</h4>
            <hr>
        </div>
        <div class="container">
            <div class="row">
            @foreach ($getHomePageData['videoGalleries'] as $videoGallery)
                <div class="col-md-3">
                    <iframe src="{{$videoGallery->url}}" width="350" height="300">
                    </iframe>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <section id="gallery" class="wow fadeInUp">
        <div class="container bg-light p-3">
            <h4 class="text-center pt-3 mb-3 imp-link">@lang('messages.gallery')</h4>
            <hr class="mb-4">

            <!-- Owl Carousel -->
            <div class="owl-carousel gallery-carousel">
                @foreach ($getHomePageData['galleries'] as $gallery)
                    <div class="gallery-img">
                        <a href="{{ route('gallery', $gallery->slug) }}" title="{{$gallery->title}}">
                            @if ($gallery->getMedia('thumbnail')->isNotEmpty())
                                <img src="{{$gallery->getMedia('thumbnail')->first()->getUrl()}}" 
                                    class="img-fluid img-thumbnail w-100 h-200 object-fit-cover" 
                                    alt="{{$gallery->title}}">
                            @else
                                <img src="{{ asset('assets/frontend/uploads/img/logo.png')}}" 
                                    alt="{{$gallery->title}}"
                                    class="img-fluid img-thumbnail w-100 h-200 object-fit-cover">
                            @endif
                        </a>
                        <div class="caption mt-2 text-center bg-dark bg-opacity-50 text-white p-2 rounded">
                            <p class="mb-0">
                            {{  Illuminate\Support\Str::limit(session('locale') === 'en' ? $gallery->title : ($gallery->title_nep ?? $gallery->title), 40) }}
                            </p>                    
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- View More Button -->
            <div class="text-center mt-4">
                <a href="{{ route('gallery.index') }}" class="btn btn-warning text-white">@lang('messages.view_more') >> </a>
            </div>
        </div>
    </section>

    <script type="text/javascript">
        $(document).ready(function(){
            $('.gallery-carousel').owlCarousel({
                items: 1,
                loop: false,
                nav: true,
                dots: true,
                autoplay: true,
                autoplayTimeout: 3000,
                autoplayHoverPause: true
            });
        });
    </script>
@endsection
