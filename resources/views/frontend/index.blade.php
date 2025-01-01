@extends('frontend.layout.master')
@section('mainContent')
    <section id="flash" class="wow fadeInUp">
        <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-2 col-lg-1 news-tag">सूचना</div>
                <div class="col-sm-12 col-md-10 col-lg-10 news">
                    <div class="owl-carousel flash-caresol">
                        @foreach ($getHomePageData['tickers'] as $tickers)
                        <a href="#">
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
                            <a class="nav-item nav-link active tabbg" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">सूचना / समाचार</a>
                            <a class="nav-item nav-link tabbg" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">कानून / नियमावली</a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active border-tab" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <ul>
                                        <li>
                                <span class="fa fa-thumb-tack sticky"></span>                            <a href="detail/271.html" title="व्यावसायिक सामाजिक जिम्मेवारी (CSR) सम्बन्धी विवरण पेश गर्ने सम्बन्धी सूचना।">व्यावसायिक सामाजिक जिम्मेवारी (CSR) सम्बन्धी विवरण पेश गर्ने सम्बन्धी सूचना।</a>
                                            </li>
                                        <li>
                                <span class="fa fa-thumb-tack sticky"></span>                            <a href="detail/264.html" title="उत्पादन करारको सम्झौता अभिलेखीकरणका लागि दिनुपर्ने निवेदनको ढाँचा">उत्पादन करारको सम्झौता अभिलेखीकरणका लागि दिनुपर्ने निवेदनको ढाँचा</a>
                                            </li>
                                        <li>
                                <span class="fa fa-thumb-tack sticky"></span>                            <a href="detail/240.html" title="स्वचालित मार्ग (अटोम्टिक रुट) मार्फत विदेशी लगानी स्वीकृति हुने प्रणाली कार्यान्वयनमा ल्याइएको सम्बन्धी सूचना ।">स्वचालित मार्ग (अटोम्टिक रुट) मार्फत विदेशी लगानी स्वीकृति हुने प्रणाली कार्यान्वयनमा ल्याइएको सम्बन्धी सूचना ।</a>
                                            </li>
                                        <li>
                                                            <a href="detail/270.html" title="Monthly Report of Foreign Direct Investment Approval of Mangsir, 2081">Monthly Report of Foreign Direct Investment Approval of Mangsir, 2081</a>
                                            </li>
                                        <li>
                                                            <a href="detail/268.html" title="Monthly Report of Foreign Direct Investment Approval of Kartik, 2081">Monthly Report of Foreign Direct Investment Approval of Kartik, 2081</a>
                                            </li>
                                        <li>
                                                            <a href="detail/266.html" title="स्वत प्रकाशन आ.व २०८१_८२_प्रथम त्रैमासिक">स्वत प्रकाशन आ.व २०८१_८२_प्रथम त्रैमासिक</a>
                                            </li>
                                        <li>
                                                            <a href="detail/265.html" title="Monthly FDI Approval Report of 2081, Ashwin">Monthly FDI Approval Report of 2081, Ashwin</a>
                                            </li>
                                        <li>
                                                            <a href="detail/263.html" title="सूचना सम्बन्धमा ।">सूचना सम्बन्धमा ।</a>
                                            </li>
                                        <li>
                                                            <a href="detail/262.html" title="Foreign Investment in Nepal 2024 ,Till July 15( A complete guide for investors)">Foreign Investment in Nepal 2024 ,Till July 15( A complete guide for investors)</a>
                                            </li>
                                        <li>
                                                            <a href="detail/261.html" title="Monthly FDI Approval Report of 2081, Bhadra">Monthly FDI Approval Report of 2081, Bhadra</a>
                                            </li>
                                        <span class="float-right more"><a href="archiving.html">विभागका सुचनाहरु &raquo;</a></span>
                            <span class="clearfix"></span>
                            </ul>
                        </div>
                        <div class="tab-pane fade border-tab" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <ul>
                                        <li>
                                                        <a href="detail/269.html" title="औद्योगिक व्यवसाय ऐन, २०७६">औद्योगिक व्यवसाय ऐन, २०७६</a>
                                        </li>
                                    <li>
                                                        <a href="detail/260.html" title="कच्चा पदार्थ खपत नर्म्स निर्धारण तथा पुनरावलोकन सम्बन्धी मापदण्ड, २०८१">कच्चा पदार्थ खपत नर्म्स निर्धारण तथा पुनरावलोकन सम्बन्धी मापदण्ड, २०८१</a>
                                        </li>
                                    <li>
                                                        <a href="detail/259.html" title="‍वस्तुको उत्पादन गर्न करार (कन्ट्रयाक्ट) वा उपकरार (सव कन्ट्रयाक्ट) सम्बन्धी मापदण्ड, २०८१">‍वस्तुको उत्पादन गर्न करार (कन्ट्रयाक्ट) वा उपकरार (सव कन्ट्रयाक्ट) सम्बन्धी मापदण्ड, २०८१</a>
                                        </li>
                                    <li>
                                                        <a href="detail/239.html" title="लगानी सहजीकरण सम्बन्धी केही नेपाल ऐनलाई संशोधन गर्ने ऐन, २०८१ अरि१४,३-२४)">लगानी सहजीकरण सम्बन्धी केही नेपाल ऐनलाई संशोधन गर्ने ऐन, २०८१ अरि१४,३-२४)</a>
                                        </li>
                                    <li>
                                                        <a href="detail/222.html" title="माइक्रो ब्रुअरी सहितको रेष्टुरेण्ट उद्योग स्थापना गर्ने सम्बन्धी मापदण्ड">माइक्रो ब्रुअरी सहितको रेष्टुरेण्ट उद्योग स्थापना गर्ने सम्बन्धी मापदण्ड</a>
                                        </li>
                                    <li>
                                                        <a href="detail/221.html" title="मदिरा तथा वियर उद्योग सम्बनधको संशोधित मापदण्ड-२०७९">मदिरा तथा वियर उद्योग सम्बनधको संशोधित मापदण्ड-२०७९</a>
                                        </li>
                                    <li>
                                                        <a href="detail/205.html" title="Standard Measurement and Weight Act, 2025 (1968)">Standard Measurement and Weight Act, 2025 (1968)</a>
                                        </li>
                                    <li>
                                                        <a href="detail/204.html" title="Mines-and-Minerals-Act-2042-1985">Mines-and-Minerals-Act-2042-1985</a>
                                        </li>
                                    <li>
                                                        <a href="detail/203.html" title="Petroleum-Act-2040-1983">Petroleum-Act-2040-1983</a>
                                        </li>
                                    <li>
                                                        <a href="detail/202.html" title="Nepal-standards-certification-mark-act-2037">Nepal-standards-certification-mark-act-2037</a>
                                        </li>
                                    <span class="float-right"><a href="laws-and-regulations.html">विभागका सुचनाहरु &raquo;</a></span>
                                    <span class="clearfix"></span>
                                </ul>
                            </div>
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
                <a class="nav-item nav-link active tabbg" id="nav-suchana-tab"  data-toggle="tab" href="#nav-suchhana" role="tab" aria-controls="nav-suchana" aria-selected="true"> <i class="fa fa-newspaper-o fa-lg"></i> <span class="d-none d-md-inline-block">सूचना / समाचार</span></a>
                <a class="nav-item nav-link tabbg" id="nav-namunakanun-tab"  data-toggle="tab" href="#nav-namunakanun" role="tab" aria-controls="nav-namunakanun" aria-selected="false"><i class="fa fa-balance-scale fa-lg"></i> <span class="d-none d-md-inline-block">कानून / नियमावली</span></a>
                <a class="nav-item nav-link tabbg" id="nav-trainnig-tab" data-toggle="tab" href="#nav-trainnig" role="tab" aria-controls="nav-traninnig" aria-selected="false"><i class="fa fa-list-ul fa-lg"></i> <span class="d-none d-md-inline-block">बोलपत्र सम्बन्धी सूचना</span></a>
                <a class="nav-item nav-link tabbg" id="nav-publication-tab" data-toggle="tab" href="#nav-publication" role="tab" aria-controls="nav-publication" aria-selected="false"><i class="fa fa-book fa-lg"></i> <span class="d-none d-md-inline-block">प्रकाशन</span></a>
              </div>
            </nav>
            <div class="tab-content" id="nav-tab1">

              <div class="tab-pane fade show active border-tab" id="nav-suchhana" role="tabpanel" aria-labelledby="nav-suchana-tab">
                <ul>
                  {{-- <li>
      <span class="fa fa-thumb-tack"></span>    <a href="detail/264.html" title="उत्पादन करारको सम्झौता अभिलेखीकरणका लागि दिनुपर्ने निवेदनको ढाँचा" target="_blank">
                उत्पादन करारको सम्झौता अभिलेखीकरणका लागि दिनुपर्ने निवेदनको ढाँचा
            </a>
      <i><small>
                    प्रकाशित मिति २०८१ आश्विन २१ गते सोमबार २२:४९:५२ बजे
              <span> (अनुमति तथा दर्ता शाखा)</span>
      </small></i>
    </li> --}}

                  <span class="float-right more"><a href="#" class="btn btn-sm btn-danger">थप समाग्री &raquo;</a></span>
                  <span class="clearfix"></span>
                </ul>
              </div>

              <div class="tab-pane fade border-tab" id="nav-namunakanun" role="tabpanel" aria-labelledby="nav-namunakanun-tab">
                <ul>
                   {{-- <li>
          <a href="detail/269.html" title="औद्योगिक व्यवसाय ऐन, २०७६" target="_blank">
                औद्योगिक व्यवसाय ऐन, २०७६
            </a>
      <i><small>
                    प्रकाशित मिति २०८१ मंसिर १० गते सोमबार १९:१८:०० बजे
              <span> (उद्योग विभाग)</span>
      </small></i>
    </li> --}}

                  <span class="float-right more"><a href="#" class="btn btn-sm btn-danger">थप समाग्री &raquo;</a></span>
                  <span class="clearfix"></span>
                </ul>
              </div>

              <div class="tab-pane fade border-tab" id="nav-trainnig" role="tabpanel" aria-labelledby="nav-trainnig-tab">
                <ul>
                  {{-- <li>
          <a href="#" title="बोलपत्र स्वीकृत गर्ने आशयको सूचना" target="_blank">
                बोलपत्र स्वीकृत गर्ने आशयको सूचना
            </a>
      <i><small>
                    प्रकाशित मिति २०७९ माघ १९ गते बिहीबार १६:२६:०९ बजे
              <span> (उद्योग विभाग)</span>
      </small></i>
    </li> --}}

                  <span class="float-right more"><a href="#" class="btn btn-sm btn-danger">थप समाग्री &raquo;</a></span>
                  <span class="clearfix"></span>
                </ul>
              </div>

              <div class="tab-pane fade border-tab" id="nav-publication" role="tabpanel" aria-labelledby="nav-publication-tab">
                <ul>
                    <li>
          <a href="#" title="स्वत प्रकाशन आ.व २०८१_८२_प्रथम त्रैमासिक" target="_blank">
                स्वत प्रकाशन आ.व २०८१_८२_प्रथम त्रैमासिक
            </a>
      <i><small>
                    प्रकाशित मिति २०८१ कार्तिक २८ गते बुधबार २१:२५:५१ बजे
              <span> (प्रशासन तथा सुविधा शाखा)</span>
      </small></i>
    </li>

                 <span class="float-right more"><a href="#" class="btn btn-sm btn-danger">थप समाग्री &raquo;</a></span>
                  <span class="clearfix"></span>
                </ul>
              </div>
            </div>

          </div>
          <!--endtab-->
          <!-- official -->
                  <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 bidhut-social remove_margin">
                    <div class="wow fadeInRight" data-wow-delay="0.2s">
                        {{-- @foreach ($getHomePageData['staffs'] as $staffs)
                        <div class="profile-ebox photo-placeholder ">
                            <div class="single-profile">
                                <h5 class="position_np">{{$staffs->position}}</h5>
                                <center>
                                    @if ($staffs->getMedia('staffs')->isNotEmpty())
                                        <img
                                        src="{{$staffs->getMedia('staffs')[0]->getUrl()}}"
                                        alt="{{$staffs->name}}"
                                        width="122"
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
                                <p class="name mt-1"> {{$staffs->name}} </p>
                            <p class=""> <i class="fa fa-phone"></i> {{$staffs->telephone}}</p>
                            </div>
                        @endforeach --}}

                        <div class="profile-ebox photo-placeholder ">
                            <div class="single-profile">
                                <h5 class="position_np">Director General</h5>
                                <center>

                                        <img
                                        src="{{ url('/images/WhatsApp Image 2024-12-30 at 19.28.35.jpeg') }}"
                                        alt="Dr. Bikash Devkota"
                                        width="122"
                                        class="img-fluid img-thumbnail"
                                        title="Dr. Bikash Devkota"
                                        >
                                </center>
                                <p class="name mt-1"> Dr. Bikash Devkota </p>
                            <p class=""> <i class="fa fa-phone"></i> 98xxxxxxxxxx</p>
                            </div>


                    </div>
            </div>
          </div>
                  <!-- end official -->
        </div>
    </div>
  </section>

  {{-- <section id="office" class="wow fadeInUp d-none d-md-block">

    <div class="bibhag-list">

    </div>
  </div></section> --}}

    <section id="all_notice" class="wow fadeInUp d-sm-block d-none mt-3">
        <div class="container bibhag pl-2">
            <h4 class="text-center pt-3 mb-0 pb-0 imp-link">महत्वपूर्ण लिङ्कहरु</h4>
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

    <section id="gallery" class="wow fadeInUp">
        <div class="container bg-silver" style="padding:0px 0px 6px 8px;">
            <h2 class="text-center pt-3 text-uppercase">विभागका गतिविधि</h2>
            <hr>
            <div class="owl-carousel gallery-carousel">
            @foreach ($getHomePageData['galleries'] as $gallery)
                <div class="gallery-img">
                    <a href="#" title="{{$gallery->title}}">
                        @if ($gallery->getMedia('thumbnail')->isNotEmpty())
                        <img src="{{$gallery->getMedia('thumbnail')->first()->getUrl()}}" class="img-fluid" alt="{{$gallery->title}}">
                        @endif
                    </a>
                </div>
            @endforeach
            </div>
        </div>
    </section>

@endsection
