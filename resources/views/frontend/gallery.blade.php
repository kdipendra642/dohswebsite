@extends('frontend.layout.master')
@section('mainContent')

<div class="container">
    <div class="breadcump">
        <a href="{{route('index') }}"><i class="fa fa-home fa-lg"></i> </a>  / <strong>{{$galleryPageData->title}}</strong></div>
        <div class="row gallery">
            <ul id="doind-gallery">
                @foreach ($galleryPageData->supportingImages as $supportingImages)
                <li class="col-xs-6 col-sm-4 col-md-3" data-src="{{ $supportingImages->getUrl()}}"  data-sub-html="<h3>{{$supportingImages->name}}</h3>">
                    <a href="javascript:;">
                        <img src="{{ $supportingImages->getUrl()}}" alt="{{$supportingImages->name}}" class="img-fluid img-thumbnail">
                    </a>
                </li>
                @endforeach
                
            </ul>
        </div>
    </div>

@endsection