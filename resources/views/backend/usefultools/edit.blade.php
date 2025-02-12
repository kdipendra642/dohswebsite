@extends('backend.layout.master')

@section('mainContent')
@include('backend.ckeditor.upperscript')

<section class="wrapper">
    <div class="row">
        <div class="col-lg-12">
            <!--breadcrumbs start -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}"><i class="fa fa-home"></i> Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('usefultools.index') }}">Smart Health Initiaves</a></li>
                    <li class="breadcrumb-item active"><a href="#">Add Smart Health Initiaves </a></li>
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
                    Smart Health Initiaves
                    <div class="pull-right hidden-phone">
                        <a href="{{ route('usefultools.index') }}" class="btn btn-success btn-sm"><i class="fa fa-arrow-left"></i> Go Back</a>
                    </div>
                </header>

                <div class="card-body">
                    <form action="{{ route('usefultools.update', $usefulTools->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" id="title" placeholder="Enter title" value="{{ $usefulTools->title }}">
                        </div>
                        <div class="form-group">
                            <label for="url">URL</label>
                            <input type="url" name="url" class="form-control" id="url" placeholder="Enter url" value="{{ $usefulTools->url }}">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description">{{ $usefulTools->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="icons">Select icon</label>
                            <input type="file" id="icons" name="icons">

                            <div>
                                <label>Old File</label>
                                <br>
                                @if ($usefulTools->getMedia('icons')->isNotEmpty())
                                    <div class="card-body">
                                        <ul class="grid cs-style-3">
                                            <li>
                                            @if (
                                                        $usefulTools->getMedia('icons')[0]->mime_type == 'image/png'
                                                        || $usefulTools->getMedia('icons')[0]->mime_type == 'image/jpeg'
                                                        || $usefulTools->getMedia('icons')[0]->mime_type == 'image/jpg'
                                                    )
                                                <figure>
                                                    <img src="{{$usefulTools->getMedia('icons')[0]->getUrl()}}" alt="{{$usefulTools->title}}" style="width: 25%; height: 25%;">
                                                    <figcaption>
                                                        <h3>{{$usefulTools->getMedia('icons')[0]->name}}</h3>
                                                        <!-- <a class="fancybox" rel="group" href="img/gallery/3.jpg">Take a look</a> -->
                                                    </figcaption>
                                                    <a href="{{ route('delete.image', $usefulTools->getMedia('icons')[0]->id) }}" class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete</a>
                                                </figure>
                                                @else
                                                <a href="#">{{$usefulTools->getMedia('icons')[0]->name}}</a>                                
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

@include('backend.ckeditor.lowerscript')

@endsection
