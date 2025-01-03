@extends('frontend.layout.master')
@section('mainContent')

<div class="container">
    <div class="breadcump">
        <a href="{{ route('index') }}"><i class="fa fa-home fa-lg"></i> </a>  / <strong>Gallery</strong>
    </div>
    <div class="row gallery">
        <ul id="doind-gallery">
            @foreach ($galleries as $gallery)
                <li class="col-xs-6 col-sm-4 col-md-3" data-src="{{$gallery}}" data-sub-html="<h3>{{$gallery->title}}</h3>">
                    <a href="{{ route('gallery', $gallery->slug) }}">
                    @if ($gallery->getMedia('thumbnail')->isNotEmpty())
                        <img src="{{$gallery->getMedia('thumbnail')->first()->getUrl()}}" alt="{{$gallery->title}}" class="img-fluid img-thumbnail">
                    @endif
                    </a>
                    <h4>{{$gallery->title}}</h4>
                    <hr style="border: 2px solid #000">
                    <span>{{ Carbon\Carbon::parse($gallery->created_at)->format('d F, Y, l')}}</span>
                </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection