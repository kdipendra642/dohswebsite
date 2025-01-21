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
                    <li class="breadcrumb-item"><a href="{{ route('popups.index') }}">Popups</a></li>
                    <li class="breadcrumb-item active"><a href="#">Add Popups </a></li>
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
                    Popups
                    <div class="pull-right hidden-phone">
                        <a href="{{ route('popups.index') }}" class="btn btn-success btn-sm"><i class="fa fa-arrow-left"></i> Go Back</a>
                    </div>
                </header>

                <div class="card-body">
                    <form action="{{ route('popups.update', $popups->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="title" name="title" class="form-control" id="title" placeholder="Enter title" value="{{ $popups->title }}">
                        </div>
                        <div class="form-group">
                            <label for="invalidCheck">
                                Status
                            </label>
                            <br>
                            <input type="hidden" name="status" value="0">
                            <input class="form-check-input w-20 h-20" type="checkbox" value="1" name="status" id="invalidCheck"  style="margin: auto;width: 16px;height: 16px;" @if ($popups->status == 1) checked @endif>
                        </div>
                        <div class="form-group">
                            <label for="url">Youtube Video Url</label>
                            <input type="url" name="youtube_link" class="form-control" id="url" placeholder="Enter url" value="{{ $popups->youtube_link }}">
                        </div>
                        <div class="form-group">
                            <label for="image">File input</label>
                            <input type="file" id="image" name="image">

                            <div>
                                <label>Old File</label>
                                <br>
                                @if ($popups->getMedia('pop-ups')->isNotEmpty())
                                    <div class="card-body">
                                        <ul class="grid cs-style-3">
                                            <li>
                                            @if (
                                                        $popups->getMedia('pop-ups')[0]->mime_type == 'image/png'
                                                        || $popups->getMedia('pop-ups')[0]->mime_type == 'image/jpeg'
                                                        || $popups->getMedia('pop-ups')[0]->mime_type == 'image/jpg'
                                                    )
                                                <figure>
                                                    <img src="{{$popups->getMedia('pop-ups')[0]->getUrl()}}" alt="{{$popups->title}}" style="width: 25%; height: 25%;">
                                                    <figcaption>
                                                        <h3>{{$popups->getMedia('pop-ups')[0]->name}}</h3>
                                                        <!-- <a class="fancybox" rel="group" href="img/gallery/3.jpg">Take a look</a> -->
                                                    </figcaption>
                                                    <a href="{{ route('delete.image', $popups->getMedia('pop-ups')[0]->id) }}" class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete</a>
                                                </figure>
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
