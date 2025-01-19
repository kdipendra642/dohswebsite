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
        <div class="col-md-12">
            <div class="text-center">
                @foreach ($galleryPageData->supportingImages as $supportingImage)
                    <img src="{{ $supportingImage->getUrl() }}" alt="{{ $supportingImage->name }}" class="img-fluid img-thumbnail" width="60%">
                @endforeach
            </div>
            
            <div>
                <h5 style="text-align: left;">
                    {{ $title }}
                </h5>
                <hr>
                {{ $description }}
            </div>
        </div>
    </div>
</div>
@endsection