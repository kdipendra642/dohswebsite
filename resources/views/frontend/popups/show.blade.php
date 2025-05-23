@extends('frontend.layout.master')
@section('mainContent')

<section id="clients" class="wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
    <div class="container content nopad">
        <div class="row">
            <div class="col-lg-9 col-sm-9 col-xs-12 page-detail">
                <div class="breadcump">
                    <a href="{{route('index') }}"><i class="fa fa-home fa-lg"></i> </a>  / {{$popups->title}}
                </div>
                <div class="page">
                    <h2 class="notice_title">{{$popups->title}}</h2>
                    <div class="subheader-social">

                        <h3 class="text-left">
                            <i class="fas fa-edit"></i>
                            Updated at
                            <small>
                                <i class="fa fa-clock"></i>
                                {{ Carbon\Carbon::parse($popups->created_at)->format('d F, Y, l')}}
                            </small>
                        </h3>

                    </div>
                    @if ($popups->getMedia('pop-ups')->isNotEmpty())
                        @if (
                            $popups->getMedia('pop-ups')[0]->mime_type == 'image/png'
                            || $popups->getMedia('pop-ups')[0]->mime_type == 'image/jpeg'
                            || $popups->getMedia('pop-ups')[0]->mime_type == 'image/jpg'
                        )
                        <img src="{{$popups->getMedia('pop-ups')[0]->getUrl()}}" alt="{{$popups->title}}" class="img-fluid">
                        @endif

                        @if ($popups->getMedia('pop-ups')[0]->mime_type == 'application/pdf')
                            <div class="d-none d-md-block">
                                <object data="{{$popups->getMedia('pop-ups')[0]->getUrl()}}#view=FitH&amp;toolbar=1" type="application/pdf" width="100%" height="800">
                                    <param name="initZoom" value="fitToPage">
                                    <p>Your Device Cannot read PDF. <a rel="external" href="{{$popups->getMedia('pop-ups')[0]->getUrl()}}">Click to View</a></p>
                                </object>
                            </div>
                            <div class="attach">
                                <a href="{{$popups->getMedia('pop-ups')[0]->getUrl()}}" target="_blank" data-toggle="tooltip" data-placement="bottom" title="{{ $title }}">
                                    <i class="fa fa-file-pdf-o fa-5x"></i>
                                </a>
                            </div>
                        @endif
                    @endif
                </div>
            </div>

            <!-- sidebar starts here -->
            <div class="col-lg-3 col-sm-3 col-xs-12">
                @include('frontend.includes.sidebar')
            <!-- sidebar ends here -->

        </div>
    </div>
</section>


@endsection
