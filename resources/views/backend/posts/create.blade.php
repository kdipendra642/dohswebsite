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
                    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="category_id">Select Category</label>
                            <select name="category_id" class="form-control" id="category_id">
                                <option selected disabled>-- Please Select --</option>
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="title">Sub Category</label>
                            <label for="sub_category">Select Category</label>
                            <select name="sub_category" class="form-control" id="sub_category">
                                <option selected disabled>-- Please Select --</option>
                                <option value="laws-regulation">कानून / नियमावली</option>
                                <option value="information-news">सूचना / समाचार</option>
                                <option value="tender-notice">बोलपत्र सम्बन्धी सूचना</option>
                                <option value="publication">प्रकाशन</option>
                                <option value="other">अन्य</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="title">Post Title</label>
                            <input type="text" name="title" class="form-control" id="title" placeholder="Enter title" value="{{ old('title') }}">
                        </div>

                        <!-- <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{ old('description') }}</textarea>
                        </div> -->
                        
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{ old('description') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="document">File input</label>
                            <input type="file" id="document" name="document">
                        </div>

                        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                    </form>
                </div>
            </section>
        </div>
    </div>
</section>

@include('backend.ckeditor.lowerscript')
@endsection
