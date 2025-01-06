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
                    <li class="breadcrumb-item"><a href="{{ route('posts.index') }}">Posts</a></li>
                    <li class="breadcrumb-item active"><a href="#">Add Posts </a></li>
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
                    Posts
                    <div class="pull-right hidden-phone">
                        <a href="{{ route('posts.index') }}" class="btn btn-success btn-sm"><i class="fa fa-arrow-left"></i> Go Back</a>
                    </div>
                </header>

                <div class="card-body">
                    <form action="{{ route('posts.update', $posts->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="category_id">Select Category</label>
                            <select name="category_id" class="form-control" id="category_id">
                                <!-- <option selected disabled>-- Please Select --</option> -->
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}" @if ($category->id == $posts->category_id) selected @endif >{{$category->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="sub_category">Sub Category</label>
                            <select name="sub_category" class="form-control" id="sub_category">
                                <option selected disabled>-- Please Select --</option>
                                <option value="laws-regulation"  @if ($posts->sub_category == 'laws-regulation') selected @endif >कानून / नियमावली</option>
                                <option value="information-news"  @if ($posts->sub_category == 'information-news') selected @endif >सूचना / समाचार</option>
                                <option value="tender-notice"  @if ($posts->sub_category == 'tender-notice') selected @endif >बोलपत्र सम्बन्धी सूचना</option>
                                <option value="publication"  @if ($posts->sub_category == 'publication') selected @endif >प्रकाशन</option>
                                <option value="other"  @if ($posts->sub_category == 'other') selected @endif >अन्य</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="title">Slider Title</label>
                            <input type="title" name="title" class="form-control" id="title" placeholder="Enter title" value="{{ $posts->title }}">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{ $posts->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="document">File input</label>
                            <input type="file" id="document" name="document">

                            <div>
                                <label>Old File</label>
                                <br>
                                @if ($posts->getMedia('posts')->isNotEmpty())
                                    <div class="card-body">
                                        <ul class="grid cs-style-3">
                                            <li>
                                            @if (
                                                        $posts->getMedia('posts')[0]->mime_type == 'image/png'
                                                        || $posts->getMedia('posts')[0]->mime_type == 'image/jpeg'
                                                        || $posts->getMedia('posts')[0]->mime_type == 'image/jpg'
                                                    )
                                                <figure>
                                                    <img src="{{$posts->getMedia('posts')[0]->getUrl()}}" alt="{{$posts->title}}" style="width: 25%; height: 25%;">
                                                    <figcaption>
                                                        <h3>{{$posts->getMedia('posts')[0]->name}}</h3>
                                                        <!-- <a class="fancybox" rel="group" href="img/gallery/3.jpg">Take a look</a> -->
                                                    </figcaption>
                                                    <a href="{{ route('delete.image', $posts->getMedia('posts')[0]->id) }}" class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete</a>
                                                </figure>
                                                @else
                                                <a href="{{$posts->getMedia('posts')[0]->getUrl()}}">{{$posts->getMedia('posts')[0]->name}}</a>  
                                                <a href="{{ route('delete.image', $posts->getMedia('posts')[0]->id) }}" class="btn btn-danger"><i class="fa fa-trash-o"></i> </a>
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
