@extends('backend.layout.master')

@section('mainContent')

<section class="wrapper">
    <div class="row">
        <div class="col-lg-12">
            <!--breadcrumbs start -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}"><i class="fa fa-home"></i> Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('galleries.index') }}">Gallery</a></li>
                    <li class="breadcrumb-item active"><a href="#">Add Gallery </a></li>
                </ol>
            </nav>
            <!--breadcrumbs end -->
        </div>
    </div>

    <!-- page start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="card">
                <header class="card-header">
                    Gallery
                    <div class="pull-right hidden-phone">
                        <a href="{{ route('galleries.index') }}" class="btn btn-success btn-sm"><i class="fa fa-arrow-left"></i> Go Back</a>
                    </div>
                </header>

                <div class="card-body">
                    <form action="{{ route('galleries.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="title">Gallery Title</label>
                            <input type="title" name="title" class="form-control" id="title" placeholder="Enter title" value="{{ $gallery->title }}">
                        </div>

                        <!-- <div class="form-group">
                            <label for="thumbnail">File input</label>
                            <input type="file" id="thumbnail" name="thumbnail">

                            <div>
                                <label>Old File</label>
                                <br>
                                @if ($gallery->getMedia('thumbnail')->isNotEmpty())
                                    <div class="card-body">
                                        <ul class="grid cs-style-3">
                                            <li>
                                            @if (
                                                        $gallery->getMedia('thumbnail')[0]->mime_type == 'image/png'
                                                        || $gallery->getMedia('thumbnail')[0]->mime_type == 'image/jpeg'
                                                        || $gallery->getMedia('thumbnail')[0]->mime_type == 'image/jpg'
                                                    )
                                                <figure>
                                                    <img src="{{$gallery->getMedia('thumbnail')[0]->getUrl()}}" alt="{{$gallery->title}}" style="width: 25%; height: 25%;">
                                                    <figcaption>
                                                        <h3>{{$gallery->getMedia('thumbnail')[0]->name}}</h3>
                                                    </figcaption>
                                                    <a href="{{ route('delete.image', $gallery->getMedia('thumbnail')[0]->id) }}" class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete</a>
                                                </figure>
                                                @else
                                                <a href="#">{{$gallery->getMedia('thumbnail')[0]->name}}</a>                                
                                                @endif
                                            </li>
                                        </ul>
                                    </div>
                                @endif
                            </div>
                        </div> -->

                        <div class="form-group">
                            <label for="invalidCheck">
                                Mark As Slider
                            </label>
                            <br>
                            <input type="hidden" name="add_to_slider" value="0">
                            <input class="form-check-input w-20 h-20" type="checkbox" value="1" name="add_to_slider" id="invalidCheck"  style="margin: auto;width: 16px;height: 16px;"  @if ($gallery->add_to_slider == 1) checked @endif >
                        </div>

                        <div class="form-group">
                            <label for="supporting_images">Images ( Recommended Sizes: 1200x675, 1600x900, or 1920x1080)</label>
                            <br>
                            <input type="file" id="supporting_images" name="supportingImages[]">
                        </div>

                        <ul class="cs-style-3" style="
                        display: inline-flex;
                        border: 2px dotted red;
                        margin: auto;
                        padding-top: 28px;
                        padding-left: 3px;
                    ">
                            @foreach ($gallery->supportingImages as  $supportingImgs)
                                <li>
                                    <figure>
                                        <img src="{{$supportingImgs->getUrl()}}" alt="{{$gallery->title}}" style="width: 50%; height: 50%;">
                                        {{-- <figcaption>
                                            <h3>{{$supportingImgs}}</h3>
                                            <span>lorem ipsume </span>
                                            <a class="fancybox" rel="group" href="img/gallery/4.jpg">Take a look</a>
                                        </figcaption> --}}
                                    </figure>
                                    <a href="{{ route('delete.image', $supportingImgs->id) }}" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
                                </li>
                            @endforeach
                        </ul>

                        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                    </form>
                </div>
            </section>
        </div>
    </div>
    <!-- page end-->
</section>

@endsection
