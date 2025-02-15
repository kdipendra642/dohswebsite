@extends('backend.layout.master')

@section('mainContent')

<section class="wrapper">
    <div class="row">
        <div class="col-lg-12">
            <!--breadcrumbs start -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}"><i class="fa fa-home"></i> Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('sliders.index') }}">Sliders</a></li>
                    <li class="breadcrumb-item active"><a href="#">Edit Sliders </a></li>
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
                    Sliders
                    <div class="pull-right hidden-phone">
                        <a href="{{ route('sliders.index') }}" class="btn btn-success btn-sm"><i class="fa fa-arrow-left"></i> Go Back</a>
                    </div>
                </header>

                <div class="card-body">
                    <form action="{{ route('sliders.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="title">Slider Title</label>
                            <input type="title" name="title" class="form-control" id="title" placeholder="Enter title" value="{{ $slider->title }}">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{ $slider->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="image">File input</label>
                            <input type="file" id="image" name="image">

                            <div>
                                <label>Old File</label>
                                <br>
                                @if ($slider->getMedia('sliders')->isNotEmpty())
                                    <div class="card-body">
                                        <ul class="grid cs-style-3">
                                            <li>
                                            @if (
                                                        $slider->getMedia('sliders')[0]->mime_type == 'image/png'
                                                        || $slider->getMedia('sliders')[0]->mime_type == 'image/jpeg'
                                                        || $slider->getMedia('sliders')[0]->mime_type == 'image/jpg'
                                                    )
                                                <figure>
                                                    <img src="{{$slider->getMedia('sliders')[0]->getUrl()}}" alt="{{$slider->title}}" style="width: 25%; height: 25%;">
                                                    <figcaption>
                                                        <h3>{{$slider->getMedia('sliders')[0]->name}}</h3>
                                                        <!-- <a class="fancybox" rel="group" href="img/gallery/3.jpg">Take a look</a> -->
                                                    </figcaption>
                                                    <a href="{{ route('delete.image', $slider->getMedia('sliders')[0]->id) }}" class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete</a>
                                                </figure>
                                                @else
                                                <a href="#">{{$slider->getMedia('sliders')[0]->name}}</a>                                
                                                @endif
                                            </li>
                                        </ul>
                                    </div>
                                @endif

                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                    </form>
                </div>
            </section>
        </div>
    </div>
    <!-- page end-->
</section>

@endsection
