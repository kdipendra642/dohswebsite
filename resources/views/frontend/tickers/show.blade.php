@extends('frontend.layout.master')
@section('mainContent')

<section id="clients" class="wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
    <div class="container content nopad">
        <div class="row">
            <div class="col-lg-9 col-sm-9 col-xs-12 page-detail">
                <div class="breadcump">
                    <a href="{{route('index') }}"><i class="fa fa-home fa-lg"></i> </a>  / {{$tickers->title}}
                </div>
                <div class="page">
                    <h2 class="notice_title">{{$tickers->title}}</h2>
                    <div class="subheader-social">

                        <h3 class="text-left">
                            <i class="fas fa-edit"></i>
                            Updated at
                            <small>
                                <i class="fa fa-clock"></i>
                                {{ Carbon\Carbon::parse($tickers->created_at)->format('d F, Y, l')}}
                            </small>
                        </h3>

                    </div>
                    @if ($tickers->getMedia('tickers')->isNotEmpty())

                        @if (
                            $tickers->getMedia('tickers')[0]->mime_type == 'image/png'
                            || $tickers->getMedia('tickers')[0]->mime_type == 'image/jpeg'
                            || $tickers->getMedia('tickers')[0]->mime_type == 'image/jpg'
                        )
                        <img src="{{$tickers->getMedia('tickers')[0]->getUrl()}}" alt="{{$tickers->title}}" class="img-fluid">
                        @endif

                    @endif
                    <p>
                        {!! $tickers->description !!}
                    </p>
                    @if ($tickers->getMedia('tickers')->isNotEmpty())
                        @if ($tickers->getMedia('tickers')[0]->mime_type == 'application/pdf')
                            <div class="d-none d-md-block">
                                <object data="{{$tickers->getMedia('tickers')[0]->getUrl()}}#view=FitH&amp;toolbar=1" type="application/pdf" width="100%" height="800">
                                    <param name="initZoom" value="fitToPage">
                                    <p>Your Device Cannot read PDF. <a href="{{$tickers->getMedia('tickers')[0]->getUrl()}}">Click to View</a></p>
                                </object>
                            </div>
                            <div class="attach">
                                <a href="{{$tickers->getMedia('tickers')[0]->getUrl()}}" target="_blank" data-toggle="tooltip" data-placement="bottom" title="{{ $title }}">
                                    <i class="fa fa-file-pdf-o fa-5x"></i>
                                </a>
                            </div>
                        @endif

                    @endif
                </div>
            </div>

            <!-- sidebar starts here -->
            <div class="col-lg-3 col-sm-3 col-xs-12">
          <div class="section-header aside-detail margintop">
    <h2><i class="fa fa-rss"></i> More Notices</h2>

</div>
         </div>

            <!-- sidebar ends here -->

        </div>
    </div>
</section>


@endsection
