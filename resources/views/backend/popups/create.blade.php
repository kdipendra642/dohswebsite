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
                    <li class="breadcrumb-item"><a href="{{ route('popups.index') }}">Pop Ups</a></li>
                    <li class="breadcrumb-item active"><a href="#">Add Pop Ups </a></li>
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
                    Pop Ups
                    <div class="pull-right hidden-phone">
                        <a href="{{ route('popups.index') }}" class="btn btn-success btn-sm"><i class="fa fa-arrow-left"></i> Go Back</a>
                    </div>
                </header>

                <div class="card-body">
                    <form action="{{ route('popups.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Post Title</label>
                            <input type="text" name="title" class="form-control" id="title" placeholder="Enter title" value="{{ old('title') }}">
                        </div>
                        <div class="form-group">
                            <label for="invalidCheck">
                                Status
                            </label>
                            <br>
                            <input type="hidden" name="status" value="0">
                            <input class="form-check-input w-20 h-20" type="checkbox" value="1" name="status" id="invalidCheck"  style="margin: auto;width: 16px;height: 16px;" >
                        </div>

                        <div class="form-group">
                            <label for="image">File input</label>
                            <input type="file" id="image" name="image">
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
