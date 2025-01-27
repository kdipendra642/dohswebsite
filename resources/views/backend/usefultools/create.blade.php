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
                        <a href="{{ route('staffs.index') }}" class="btn btn-success btn-sm"><i class="fa fa-arrow-left"></i> Go Back</a>
                    </div>
                </header>

                <div class="card-body">
                    <form action="{{ route('usefultools.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" id="title" placeholder="Enter title" value="{{ old('title') }}">
                        </div>
                        <div class="form-group">
                            <label for="url">URL</label>
                            <input type="url" name="url" class="form-control" id="url" placeholder="Enter url" value="{{ old('url') }}">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description">{{ old('description') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="icons">Select icon</label>
                            <input type="file" id="icons" name="icons">
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
