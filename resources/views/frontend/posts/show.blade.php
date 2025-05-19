@extends('frontend.layout.master')
@section('mainContent')

@push('styles')
    <link rel="stylesheet" href="{{ asset('pdf-js/main.css')}}">
@endpush

@php

$title = session('locale') === 'en'
        ? $posts->title
        : ($posts->title_nep ?? $posts->title);

    $description = session('locale') === 'en'
        ? $posts->description
        : ($posts->description_nep ?? $posts->description);
@endphp

<section id="clients" class="wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
    <div class="container content nopad">
        <div class="row">
            <div class="col-lg-9 col-sm-9 col-xs-12 page-detail">
                <div class="breadcump">
                    <a href="{{route('index') }}"><i class="fa fa-home fa-lg"></i> </a>  / {{ $title }}
                </div>
                <div class="page">
                    <h2 class="notice_title">{{ $title }}</h2>
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
                        {!! $description !!}
                    </p>
                    @if ($posts->getMedia('posts')->isNotEmpty())
                        @if ($posts->getMedia('posts')[0]->mime_type == 'application/pdf')

                            <div data-pdf="{{$posts->getMedia('posts')[0]->getUrl()}}"></div>
                        @else
                            <a href="{{$posts->getMedia('posts')[0]->getUrl()}}">{{$posts->getMedia('posts')[0]->getUrl()}}</a>
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

@push('script')
    <script src="{{ asset('pdf-js/pdf.js') }}"></script>
    <script src="{{ asset('pdf-js/pdf-viewer.js') }}"></script>
    <script>
        const pdfWorker = "{{ asset('pdf-js/pdf-worker.js') }}"
        const cmaps = "{{ asset('pdf-js/cmaps') }}"

        setTimeout( PDFMiniViewers.initialize.bind( null, pdfWorker, cmaps ), 10 );
    </script>
@endpush

@endsection
