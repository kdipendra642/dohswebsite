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
                    <li class="breadcrumb-item"><a href="{{ route('tickers.index') }}">Tickers</a></li>
                    <li class="breadcrumb-item active"><a href="#">Add Tickers </a></li>
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
                    Tickers
                    <div class="pull-right hidden-phone">
                        <a href="{{ route('tickers.index') }}" class="btn btn-success btn-sm"><i class="fa fa-arrow-left"></i> Go Back</a>
                    </div>
                </header>

                <div class="card-body">
                    <form action="{{ route('tickers.update',$ticker->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="title" name="title" class="form-control" id="title" placeholder="Enter title" value="{{ $ticker->title }}">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{ $ticker->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="document">File input</label>
                            <input type="file" id="document" name="document">

                            <div>
                                <label>Old File</label>
                                <br>
                                @if ($ticker->getMedia('tickers')->isNotEmpty())
                                    <div class="card-body">
                                        <ul class="grid cs-style-3">
                                            <li>
                                            @if (
                                                        $ticker->getMedia('tickers')[0]->mime_type == 'image/png'
                                                        || $ticker->getMedia('tickers')[0]->mime_type == 'image/jpeg'
                                                        || $ticker->getMedia('tickers')[0]->mime_type == 'image/jpg'
                                                    )
                                                <figure>
                                                    <img src="{{$ticker->getMedia('tickers')[0]->getUrl()}}" alt="{{$ticker->title}}" style="width: 25%; height: 25%;">
                                                    <figcaption>
                                                        <h3>{{$ticker->getMedia('tickers')[0]->name}}</h3>
                                                        <!-- <a class="fancybox" rel="group" href="img/gallery/3.jpg">Take a look</a> -->
                                                    </figcaption>
                                                    <a href="{{ route('delete.image', $ticker->getMedia('tickers')[0]->id) }}" class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete</a>
                                                </figure>
                                                @else
                                                <a href="#">{{$ticker->getMedia('tickers')[0]->name}}</a>                                
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
