@extends('frontend.layout.master')

@section('mainContent')

@php

$title = session('locale') === 'en' 
        ? $galleryPageData->title 
        : ($galleryPageData->title_nep ?? $galleryPageData->title);

    $description = session('locale') === 'en' 
        ? $galleryPageData->description 
        : ($galleryPageData->description_nep ?? $galleryPageData->description);
@endphp

<div class="container">
    <div class="breadcump">
        <a href="{{ route('index') }}"><i class="fa fa-home fa-lg"></i></a> / 
        <strong>{{ $title }}</strong>
    </div>
    
    <div class="row gallery">
        @foreach ($galleryPageData->supportingImages as $supportingImages)
            <div class="col-md-4 mb-4">
                <a href="{{ $supportingImages->getUrl() }}" 
                   data-lightbox="gallery" 
                   data-title="{{ $supportingImages->name }}">
                    <img src="{{ $supportingImages->getUrl() }}" 
                         alt="{{ $supportingImages->name }}" 
                         class="img-fluid img-thumbnail">
                </a>
            </div>
        @endforeach
        <div class="text-center">
            <h5 style="text-align: left;">
                    {{ $title }}
                </h5>
                <hr>
                {!! $description !!}
        </div>
    </div>
</div>
@endsection