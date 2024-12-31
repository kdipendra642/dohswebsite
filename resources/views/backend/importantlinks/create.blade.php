@extends('backend.layout.master')

@section('mainContent')

<section class="wrapper">
    <div class="row">
        <div class="col-lg-12">
            <!--breadcrumbs start -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}"><i class="fa fa-home"></i> Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('importantlinks.index') }}">Tickers</a></li>
                    <li class="breadcrumb-item active"><a href="#">Important Links </a></li>
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
                    Important Links
                    <div class="pull-right hidden-phone">
                        <a href="{{ route('importantlinks.index') }}" class="btn btn-success btn-sm"><i class="fa fa-arrow-left"></i> Go Back</a>
                    </div>
                </header>

                <div class="card-body">
                    <form action="{{ route('importantlinks.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="title" name="title" class="form-control" id="title" placeholder="Enter title" value="{{ old('title') }}">
                        </div>
                        <div class="form-group">
                            <label for="url">URL</label>
                            <input type="url" name="url" class="form-control" id="url" placeholder="Enter url" value="{{ old('url') }}">
                        </div>
                        <div class="form-group">
                            <label for="invalidCheck">
                                Show On Home Page
                            </label>
                            <br>
                            <input type="hidden" name="showOnHomePage" value="0">
                            <input class="form-check-input" type="checkbox" value="1" name="showOnHomePage" id="invalidCheck" style="margin: auto;">
                            {{-- <input class="form-check-input" type="checkbox" value="1" name="showOnHomePage" id="invalidCheck" style="margin: auto;"> --}}
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
