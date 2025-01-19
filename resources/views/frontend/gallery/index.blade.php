@extends('frontend.layout.master')
@section('mainContent')

    <!-- new trial -->
    <div class="container">
        <div class="breadcump">
            <a href="{{ route('index') }}"><i class="fa fa-home fa-lg"></i> </a>  / <strong>Gallery</strong>
        </div>
        <nav>
            <div class="nav nav-tabs" id="news-tab" role="tablist">
                <a class="nav-item nav-link active tabbg" id="latest-gallery-tab"  data-toggle="tab" href="#latest-gallery" role="tab" aria-controls="latest-gallery" aria-selected="true"><span class="d-none d-md-inline-block">Latest Gallery</span></a>
                <a class="nav-item nav-link tabbg" id="archive-gallery-tab"  data-toggle="tab" href="#archive-gallery" role="tab" aria-controls="archive-gallery" aria-selected="true"><span class="d-none d-md-inline-block">Archieve Gallery</span></a>
            </div>
        </nav>

        <div class="tab-content" >
            <div class="tab-pane fade show active" id="latest-gallery" role="tabpanel" aria-labelledby="latest-gallery-tab">
                <div class="row gallery">
                    @foreach ($galleries as $gallery)
                    <div class="col-3" style="padding-right:1px;">
                        <div class="gal" style="margin-bottom:1rem;">
                            <a href="{{ route('gallery', $gallery->slug) }}" title="{{$gallery->slug}}">
                            @if (isset($gallery->supportingImages[0]))
                            <img src="{{$gallery->supportingImages[0]->getUrl()}}" class="img-fluid" alt="{{$gallery->slug}}">
                            @else
                            <img src="{{ asset('assets/frontend/uploads/img/logo.png')}}" class="img-fluid" alt="{{$gallery->slug}}">
                            @endif
                            </a>
                            <a href="{{ route('gallery', $gallery->slug) }}" title="{{$gallery->title}}">
                                <p>{{  Illuminate\Support\Str::limit(session('lang') === 'en' ? $gallery->title : ($gallery->title_nep ?? $gallery->title), 75) }}</p>
                            </a>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
            <div class="tab-pane fade" id="archive-gallery" role="tabpanel" aria-labelledby="archive-gallery-tab">
                <div class="row gallery">
                    @foreach ($archieves as $gallery)
                    <div class="col-3" style="padding-right:1px;">
                        <div class="gal" style="margin-bottom:1rem;">
                            <a href="{{ route('gallery', $gallery->slug) }}" title="{{$gallery->slug}}">
                            @if (isset($gallery->supportingImages[0]))
                            <img src="{{$gallery->supportingImages[0]->getUrl()}}" class="img-fluid" alt="{{$gallery->slug}}">
                            @else
                            <img src="{{ asset('assets/frontend/uploads/img/logo.png')}}" class="img-fluid" alt="{{$gallery->slug}}">
                            @endif
                            </a>
                            <a href="{{ route('gallery', $gallery->slug) }}" title="{{$gallery->title}}">
                                <p>{{  Illuminate\Support\Str::limit(session('lang') === 'en' ? $gallery->title : ($gallery->title_nep ?? $gallery->title), 75) }}</p>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- end new trial -->
@endsection
