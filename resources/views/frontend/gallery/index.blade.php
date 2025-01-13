@extends('frontend.layout.master')
@section('mainContent')

<style>
    .square-img {
        width: 100%;
        height: auto;
        max-width: 300px;
        aspect-ratio: 1 / 1;
        object-fit: cover;
    }
</style>
    <div class="container">
        <div class="breadcump">
            <a href="{{ route('index') }}"><i class="fa fa-home fa-lg"></i> </a>  / <strong>Gallery</strong>
        </div>
        <div class="row gallery">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <nav>
                    <div class="nav nav-tabs" id="news-tab" role="tablist">
                        <a class="nav-item nav-link active tabbg" id="nav-suchana-tab"  data-toggle="tab" href="#nav-suchhana" role="tab" aria-controls="nav-suchana" aria-selected="true"><span class="d-none d-md-inline-block">Latest Gallery</span></a>
                        <a class="nav-item nav-link tabbg" id="nav-namunakanun-tab"  data-toggle="tab" href="#nav-namunakanun" role="tab" aria-controls="nav-namunakanun" aria-selected="true"><span class="d-none d-md-inline-block">Archieve Gallery</span></a>
                    </div>
                </nav>
                <div class="tab-content" >

                    <div class="tab-pane fade show active" id="nav-suchhana" role="tabpanel" aria-labelledby="nav-suchana-tab">
                        <div class="row gallery">
                            @foreach ($galleries as $gallery)
                            <div class="col-xs-6 col-sm-4 col-md-3">
                                <a href="{{ route('gallery', $gallery->slug) }}">
                                    @if ($gallery->getMedia('thumbnail')->isNotEmpty())
                                        <img src="{{$gallery->getMedia('thumbnail')->first()->getUrl()}}" alt="{{$gallery->title}}" class="img-thumbnail square-img">
                                    @endif
                                    </a>
                                    <h4>{{Illuminate\Support\Str::limit($gallery->title, 40)}}</h4>
                                    <hr style="border: 2px solid #000">
                                    <span>{{ Carbon\Carbon::parse($gallery->created_at)->format('d F, Y, l')}}</span>
                            </div>
                            @endforeach
                            <span class="clearfix"></span>

                            {{-- <ul>
                                @foreach ($galleries as $gallery)
                                    <li class="col-xs-6 col-sm-4 col-md-3">
                                        <a href="{{ route('gallery', $gallery->slug) }}">
                                        @if ($gallery->getMedia('thumbnail')->isNotEmpty())
                                            <img src="{{$gallery->getMedia('thumbnail')->first()->getUrl()}}" alt="{{$gallery->title}}" class="img-thumbnail square-img">
                                        @endif
                                        </a>
                                        <h4>{{Illuminate\Support\Str::limit($gallery->title, 40)}}</h4>
                                        <hr style="border: 2px solid #000">
                                        <span>{{ Carbon\Carbon::parse($gallery->created_at)->format('d F, Y, l')}}</span>
                                    </li>
                                @endforeach
                            <span class="clearfix"></span>
                            </ul> --}}
                        </div>

                    </div>

                    <div class="tab-pane fade" id="nav-namunakanun" role="tabpanel" aria-labelledby="nav-namunakanun-tab">
                        <div class="row gallery">
                                {{-- <ul>
                                    @if (count($archieves) == 0)
                                        <li class="col-xs-12 col-sm-12 col-md-12">No data</li>
                                    @endif
                                    @foreach ($archieves as $gallery)
                                        <li class="col-xs-6 col-sm-4 col-md-3">
                                            <a href="{{ route('gallery', $gallery->slug) }}">
                                            @if ($gallery->getMedia('thumbnail')->isNotEmpty())
                                                <img src="{{$gallery->getMedia('thumbnail')->first()->getUrl()}}" alt="{{$gallery->title}}" class="img-thumbnail square-img">
                                            @endif
                                            </a>
                                            <h4>{{Illuminate\Support\Str::limit($gallery->title, 40)}}</h4>
                                            <hr style="border: 2px solid #000">
                                            <span>{{ Carbon\Carbon::parse($gallery->created_at)->format('d F, Y, l')}}</span>
                                        </li>
                                    @endforeach
                                <span class="clearfix"></span>
                                </ul> --}}
                                @if (count($archieves) == 0)
                                    <div class="col-xs-12 col-sm-12 col-md-12">No data found</div>
                                @endif
                                @foreach ($archieves as $gallery)
                                <div class="col-xs-6 col-sm-4 col-md-3">
                                    <a href="{{ route('gallery', $gallery->slug) }}">
                                        @if ($gallery->getMedia('thumbnail')->isNotEmpty())
                                            <img src="{{$gallery->getMedia('thumbnail')->first()->getUrl()}}" alt="{{$gallery->title}}" class="img-thumbnail square-img">
                                        @endif
                                        </a>
                                        <h4>{{Illuminate\Support\Str::limit($gallery->title, 40)}}</h4>
                                        <hr style="border: 2px solid #000">
                                        <span>{{ Carbon\Carbon::parse($gallery->created_at)->format('d F, Y, l')}}</span>
                                </div>
                                @endforeach
                                <span class="clearfix"></span>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>






@endsection
