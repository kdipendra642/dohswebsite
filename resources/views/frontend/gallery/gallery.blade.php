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
    <!-- Breadcrumb -->
    <div class="breadcump">
        <a href="{{ route('index') }}"><i class="fa fa-home fa-lg"></i></a> / 
        <strong>{{ $title }}</strong>
    </div>

    <!-- Gallery -->
    <div class="row gallery">
        @foreach ($galleryPageData->supportingImages as $supportingImages)
            <div class="col-md-4 mb-4">
                <!-- Card with Fixed Dimensions -->
                <div class="card" style="width: 100%; height: 300px; overflow: hidden;">
                    <a href="{{ $supportingImages->getUrl() }}" 
                       data-lightbox="gallery" 
                       data-title="{{ $supportingImages->name }}">
                        <!-- Image Container -->
                        <div class="d-flex justify-content-center align-items-center" style="width: 100%; height: 100%;">
                            <img src="{{ $supportingImages->getUrl() }}" 
                                 alt="{{ $supportingImages->name }}" 
                                 class="img-fluid" 
                                 style="max-width: 100%; max-height: 100%; width: auto; height: auto; object-fit: contain;">
                        </div>
                    </a>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Description -->
    <div class="text-center">
        <h5 class="text-start">{{ $title }}</h5>
        <hr>
        {!! $description !!}
    </div>
</div>
@endsection