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

                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="title">Gallery Title (English)</label>
                                <input type="title" name="title" class="form-control" id="title" placeholder="Enter title" value="{{ $gallery->title }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="title_nep">Gallery Title (नेपाली)</label>
                                <input type="text" name="title_nep" class="form-control" id="title_nep" placeholder="Enter title in (नेपाली)" value="{{ $gallery->title_nep }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="invalidCheck">
                                Mark As Slider
                            </label>
                            <br>
                            <input type="hidden" name="add_to_slider" value="0">
                            <input class="form-check-input w-20 h-20" type="checkbox" value="1" name="add_to_slider" id="invalidCheck"  style="margin: auto;width: 16px;height: 16px;"  @if ($gallery->add_to_slider == 1) checked @endif >
                        </div>


                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="thumbnail">File input</label>
                                <input type="file" id="thumbnail" name="thumbnail">

                                <div>
                                    <label>Old File</label>
                                    <br>
                                    @if ($gallery->getMedia('thumbnail')->isNotEmpty())
                                    <img src="{{$gallery->getMedia('thumbnail')[0]->getUrl()}}" alt="{{$gallery->title}}" style="width: 100%;">
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="supporting_images">Images ( Recommended Sizes: 1200x675, 1600x900, or 1920x1080)</label>
                                <br>
                                <input type="file" id="supporting_images" name="supportingImages[]" multiple>
                                <div class="row mt-3">
                                    @foreach ($gallery->supportingImages as  $supportingImgs)
                                    <div class="col-md-6">
                                        <figure>
                                            <img src="{{$supportingImgs->getUrl()}}" alt="{{$gallery->title}}" class="img-thumbnail">
                                            <caption>
                                                <a href="{{ route('delete.image', $supportingImgs->id) }}" class="btn btn-danger w-100"><i class="fa fa-trash-o"></i></a>
                                            </caption>
                                        </figure>
                                    </div>
                                    @endforeach
                                </div>
                               
                            </div>
                        </div>


                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="description">Description (English)</label>
                                <textarea class="form-control" name="description" id="description" cols="30" rows="10">{!! $gallery->description !!}</textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="description_nep">Description (नेपाली)</label>
                                <textarea class="form-control" name="description_nep" id="description_nep" cols="30" rows="10">{!! $gallery->description_nep !!}</textarea>
                            </div>
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

                       

                        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                    </form>
                </div>
            </section>
        </div>
    </div>
    <!-- page end-->
</section>
@include('backend.ckeditor.lowerscript')

@endsection
