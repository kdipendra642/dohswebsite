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
                                <option value="information-news"  @if ($posts->sub_category == 'information-news') selected @endif >सूचना</option>
                                <option value="tender-notice"  @if ($posts->sub_category == 'tender-notice') selected @endif >बोलपत्र सम्बन्धी सूचना</option>
                                <option value="press-release" @if ($posts->sub_category == 'press-release') selected @endif>प्रेस विज्ञप्ति</option>
                                <option value="publication"  @if ($posts->sub_category == 'publication') selected @endif >प्रकाशन</option>
                                <option value="other"  @if ($posts->sub_category == 'other') selected @endif >अन्य</option>
                            </select>
                        </div>

                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="title">Post Title (English)</label>
                                <input type="text" name="title" class="form-control" id="title" placeholder="Enter title (English)" value="{{ $posts->title }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="title_nep">Post Title (नेपाली)</label>
                                <input type="text" name="title_nep" class="form-control" id="title_nep" placeholder="Enter title in (नेपाली)" value="{{ $posts->title_nep }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{ $posts->description }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="description_nep">Description (नेपाली)</label>
                            <textarea class="form-control" name="description_nep" id="description_nep" cols="30" rows="10">{{ $posts->description_nep }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="invalidCheck">
                                Show As Ticker
                            </label>
                            <br>
                            <input type="hidden" name="show_on_ticker" value="0">
                            <input class="form-check-input w-20 h-20" type="checkbox" value="1" name="show_on_ticker" id="invalidCheck"  style="margin: auto;width: 16px;height: 16px;"  @if ($posts->show_on_ticker == 1) checked @endif >
                        </div>

                        <div class="form-group">
                            <label for="publised_at">Publised Date</label>
                            <input type="date" name="publised_at" class="form-control" id="publised_at" placeholder="Select Date" value="{{ $posts->publised_at }}">
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
                        <div class="form-group">
                            <label for="document_nep">File input (नेपाली)</label>
                            <input type="file" id="document_nep" name="document_nep">
                
                            <div>
                                <!-- for nepali version -->
                                @if ($posts->getMedia('posts_nep')->isNotEmpty())
                                    <div class="card-body">
                                        <ul class="grid cs-style-3">
                                            <li>
                                            @if (
                                                        $posts->getMedia('posts_nep')[0]->mime_type == 'image/png'
                                                        || $posts->getMedia('posts_nep')[0]->mime_type == 'image/jpeg'
                                                        || $posts->getMedia('posts_nep')[0]->mime_type == 'image/jpg'
                                                    )
                                                <figure>
                                                    <img src="{{$posts->getMedia('posts_nep')[0]->getUrl()}}" alt="{{$posts->title}}" style="width: 25%; height: 25%;">
                                                    <figcaption>
                                                        <h3>{{$posts->getMedia('posts_nep')[0]->name}}</h3>
                                                        <!-- <a class="fancybox" rel="group" href="img/gallery/3.jpg">Take a look</a> -->
                                                    </figcaption>
                                                    <a href="{{ route('delete.image', $posts->getMedia('posts_nep')[0]->id) }}" class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete</a>
                                                </figure>
                                                @else
                                                <a href="{{$posts->getMedia('posts_nep')[0]->getUrl()}}">{{$posts->getMedia('posts_nep')[0]->name}}</a>  
                                                <a href="{{ route('delete.image', $posts->getMedia('posts_nep')[0]->id) }}" class="btn btn-danger"><i class="fa fa-trash-o"></i> </a>
                                                @endif
                                            </li>
                                        </ul>
                                    </div>
                                @endif
                                 <!-- end for nepali version -->
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
