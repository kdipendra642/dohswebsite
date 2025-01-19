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
                    <form action="{{ route('galleries.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="title">Gallery Title (English)</label>
                                <input type="text" name="title" class="form-control" id="title" placeholder="Enter title (English)" value="{{ old('title') }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="title_nep">Gallery Title (नेपाली)</label>
                                <input type="text" name="title_nep" class="form-control" id="title_nep" placeholder="Enter title in (नेपाली)" value="{{ old('title_nep') }}">
                            </div>
                        </div>

                        <!-- <div class="form-group">
                            <label for="thumbnail">Thumbnail</label>
                            <input type="file" id="thumbnail" name="thumbnail">
                        </div> -->

                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="invalidCheck">
                                    Mark As Slider
                                </label>
                                <br>
                                <input type="hidden" name="add_to_slider" value="0">
                                <input class="form-check-input w-20 h-20" type="checkbox" value="1" name="add_to_slider" id="invalidCheck" style="margin: auto;width: 16px;height: 16px;">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="supporting_images">Images ( Recommended Sizes: 1200x675, 1600x900, or 1920x1080)</label>
                                <br>
                                <input type="file" id="supporting_images" name="supportingImages[]">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="description">Description (English)</label>
                                <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{ old('description') }}</textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="description_nep">Description (नेपाली)</label>
                                <textarea class="form-control" name="description_nep" id="description_nep" cols="30" rows="10">{{ old('description_nep') }}</textarea>
                            </div>
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
