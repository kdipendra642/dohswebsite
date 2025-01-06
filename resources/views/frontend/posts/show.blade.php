@extends('frontend.layout.master')
@section('mainContent')

<section id="clients" class="wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
    <div class="container content nopad">
        <div class="row">
            <div class="col-lg-9 col-sm-9 col-xs-12 page-detail">
                <div class="breadcump">
                    <a href="{{route('index') }}"><i class="fa fa-home fa-lg"></i> </a>  / {{$posts->title}}
                </div>
                <div class="page">
                    <h2 class="notice_title">{{$posts->title}}</h2>
                    <div class="subheader-social">

                        <h3 class="text-left">
                            <i class="fas fa-edit"></i>
                            Updated at
                            <small>
                                <i class="fa fa-clock"></i>
                                {{ Carbon\Carbon::parse($posts->created_at)->format('d F, Y, l')}}
                            </small>
                        </h3>

                    </div>
                    @if ($posts->getMedia('posts')->isNotEmpty())

                        @if (
                            $posts->getMedia('posts')[0]->mime_type == 'image/png'
                            || $posts->getMedia('posts')[0]->mime_type == 'image/jpeg'
                            || $posts->getMedia('posts')[0]->mime_type == 'image/jpg'
                        )
                        <img src="{{$posts->getMedia('posts')[0]->getUrl()}}" alt="{{$posts->title}}" class="img-fluid">
                        @endif

                    @endif
                    <p>
                        {!! $posts->description !!}
                    </p>
                    @if ($posts->getMedia('posts')->isNotEmpty())
                        @if ($posts->getMedia('posts')[0]->mime_type == 'application/pdf')
                            <div class="d-none d-md-block">
                                <object data="{{$posts->getMedia('posts')[0]->getUrl()}}#view=FitH&amp;toolbar=1" type="application/pdf" width="100%" height="800">
                                    <param name="initZoom" value="fitToPage">
                                    <p>Your Device Cannot read PDF. <a rel="external" href="#">Click to View</a></p>
                                </object>
                            </div>
                        @endif

                    @endif
                </div>
            </div>

            <!-- sidebar starts here -->
            <div class="col-lg-3 col-sm-3 col-xs-12">
                @include('frontend.includes.sidebar')
            <!-- <div class="section-header aside-detail margintop">
                    <h2><i class="fa fa-rss"></i> More Notices</h2>
                    <ul>
                                                    <li>
                                    <a href="detail/271.html">
                                                                    व्यावसायिक सामाजिक जिम्मेवारी (CSR) सम्बन्धी विवरण पेश गर्ने सम्बन्धी सूचना।
                                                            </a>
                                    <small><i class="fa fa-clock-o"> ८ Hours ago</i>
                                        &nbsp; &nbsp;<i class="fa fa-building"></i> News &amp; Notice
                                    </small>
                                </li>
                                            <li>
                                    <a href="detail/270.html">
                                                                    Monthly Report of Foreign Direct Investment Approval of Mangsir, 2081
                                                            </a>
                                    <small><i class="fa fa-clock-o"> २ Weeks ago</i>
                                        &nbsp; &nbsp;<i class="fa fa-building"></i> News &amp; Notice
                                    </small>
                                </li>
                                            <li>
                                    <a href="detail/269.html">
                                                                    औद्योगिक व्यवसाय ऐन, २०७६
                                                            </a>
                                    <small><i class="fa fa-clock-o"> १ Months ago</i>
                                        &nbsp; &nbsp;<i class="fa fa-building"></i> Act
                                    </small>
                                </li>
                                            <li>
                                    <a href="detail/268.html">
                                                                    Monthly Report of Foreign Direct Investment Approval of Kartik, 2081
                                                            </a>
                                    <small><i class="fa fa-clock-o"> २ Months ago</i>
                                        &nbsp; &nbsp;<i class="fa fa-building"></i> News &amp; Notice
                                    </small>
                                </li>
                                            <li>
                                    <a href="detail/266.html">
                                                                    स्वत प्रकाशन आ.व २०८१_८२_प्रथम त्रैमासिक
                                                            </a>
                                    <small><i class="fa fa-clock-o"> २ Months ago</i>
                                        &nbsp; &nbsp;<i class="fa fa-building"></i> Right to Information
                                    </small>
                                </li>
                                            <li>
                                    <a href="detail/265.html">
                                                                    Monthly FDI Approval Report of 2081, Ashwin
                                                            </a>
                                    <small><i class="fa fa-clock-o"> ३ Months ago</i>
                                        &nbsp; &nbsp;<i class="fa fa-building"></i> News &amp; Notice
                                    </small>
                                </li>
                                            <li>
                                    <a href="detail/264.html">
                                                                    उत्पादन करारको सम्झौता अभिलेखीकरणका लागि दिनुपर्ने निवेदनको ढाँचा
                                                            </a>
                                    <small><i class="fa fa-clock-o"> ३ Months ago</i>
                                        &nbsp; &nbsp;<i class="fa fa-building"></i> News &amp; Notice
                                    </small>
                                </li>
                                            <li>
                                    <a href="detail/263.html">
                                                                    सूचना सम्बन्धमा ।
                                                            </a>
                                    <small><i class="fa fa-clock-o"> ३ Months ago</i>
                                        &nbsp; &nbsp;<i class="fa fa-building"></i> News &amp; Notice
                                    </small>
                                </li>
                                            <li>
                                    <a href="detail/262.html">
                                                                    Foreign Investment in Nepal 2024 ,Till July 15( A complete guide for investors)
                                                            </a>
                                    <small><i class="fa fa-clock-o"> ३ Months ago</i>
                                        &nbsp; &nbsp;<i class="fa fa-building"></i> News &amp; Notice
                                    </small>
                                </li>
                                            <li>
                                    <a href="detail/261.html">
                                                                    Monthly FDI Approval Report of 2081, Bhadra
                                                            </a>
                                    <small><i class="fa fa-clock-o"> ४ Months ago</i>
                                        &nbsp; &nbsp;<i class="fa fa-building"></i> News &amp; Notice
                                    </small>
                                </li>
                    </ul>
                </div>
            </div> -->

            <!-- sidebar ends here -->

        </div>
    </div>
</section>


@endsection
