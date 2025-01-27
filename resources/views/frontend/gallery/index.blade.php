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
                        <div class="col-3 mb-4">
                            <div class="card h-100 shadow-sm">
                                <a href="{{ route('gallery', $gallery->slug) }}" title="{{$gallery->slug}}" class="d-block text-decoration-none">
                                    <div class="ratio ratio-16x9"> <!-- Use Bootstrap's ratio class for responsive aspect ratio -->
                                        @if ($gallery->getMedia('thumbnail')->isNotEmpty())
                                            <img src="{{$gallery->getMedia('thumbnail')->first()->getUrl()}}" 
                                                alt="{{$gallery->slug}}" 
                                                class="img-fluid" style="object-fit: cover;"> <!-- Use object-fit to cover the area -->
                                        @else
                                            <img src="{{ asset('assets/frontend/uploads/img/logo.png')}}" 
                                                alt="{{$gallery->slug}}" 
                                                class="img-fluid" style="object-fit: cover;">
                                        @endif
                                    </div>
                                    <div class="p-3 flex-grow-1">
                                        <p class="mb-0 text-dark">{{ Illuminate\Support\Str::limit(session('lang') === 'en' ? $gallery->title : ($gallery->title_nep ?? $gallery->title), 30) }}</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
            <div class="tab-pane fade" id="archive-gallery" role="tabpanel" aria-labelledby="archive-gallery-tab">
                <div class="row gallery">
                    @foreach ($archieves as $gallery)
                        <div class="col-3 mb-4">
                            <div class="card h-100 shadow-sm">
                                <a href="{{ route('gallery', $gallery->slug) }}" title="{{$gallery->slug}}" class="d-block text-decoration-none">
                                    <!-- Image Container -->
                                    <div class="ratio ratio-16x9"> <!-- Use Bootstrap's ratio class for responsive aspect ratio -->
                                        @if ($gallery->getMedia('thumbnail')->isNotEmpty())
                                            <img src="{{$gallery->getMedia('thumbnail')->first()->getUrl()}}" 
                                                alt="{{$gallery->slug}}" 
                                                class="img-fluid" style="object-fit: cover;"> <!-- Use object-fit to cover the area -->
                                        @else
                                            <img src="{{ asset('assets/frontend/uploads/img/logo.png')}}" 
                                                alt="{{$gallery->slug}}" 
                                                class="img-fluid" style="object-fit: cover;">
                                        @endif
                                    </div>
                                    <!-- Title -->
                                    <div class="p-3 flex-grow-1">
                                        <p class="mb-0 text-dark">{{ Illuminate\Support\Str::limit(session('lang') === 'en' ? $gallery->title : ($gallery->title_nep ?? $gallery->title), 30) }}</p>
                                    </div>
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
