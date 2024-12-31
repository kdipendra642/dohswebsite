@extends('backend.layout.master')

@section('mainContent')

<section class="wrapper">
    <div class="row">
        <div class="col-lg-12">
            <!--breadcrumbs start -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}"><i class="fa fa-home"></i> Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="#">Site Settings </a></li>
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
                    Site Settings
                    <div class="pull-right hidden-phone">
                        <a href="{{ route('dashboard.index') }}" class="btn btn-success btn-sm"><i class="fa fa-arrow-left"></i> Go Back</a>
                    </div>
                </header>

                <div class="card-body">
                    <form action="{{ route('sitesettings.store') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="titleOne">Site Title One</label>
                            <input type="text" name="titleOne" class="form-control" id="titleOne" placeholder="Enter Site Title" value="{{ $sitesettings[0]->titleOne ?? '' }}">
                        </div>
                        <div class="form-group">
                            <label for="titleTwo">Site Title Two</label>
                            <input type="text" name="titleTwo" class="form-control" id="titleTwo" placeholder="Enter Site Title" value="{{ $sitesettings[0]->titleTwo ?? '' }}">
                        </div>
                        <div class="form-group">
                            <label for="titleThree">Site Title Three</label>
                            <input type="text" name="titleThree" class="form-control" id="titleThree" placeholder="Enter Site Title" value="{{ $sitesettings[0]->titleThree ?? '' }}">
                        </div>
                        <div class="form-group">
                            <label for="titleFour">Site Title Four</label>
                            <input type="text" name="titleFour" class="form-control" id="titleFour" placeholder="Enter Site Title" value="{{ $sitesettings[0]->titleFour ?? '' }}">
                        </div>
                        <div class="form-group">
                            <label for="description">Site Description</label>
                            <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{ $sitesettings[0]->description ?? '' }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" name="address" class="form-control" id="address" placeholder="Enter Address" value="{{ $sitesettings[0]->address ?? '' }}">
                        </div>
                        <div class="form-group">
                            <label for="primaryContact">Primary Contact</label>
                            <input type="tel" name="primaryContact" class="form-control" id="primaryContact" placeholder="Enter Primary Contact" value="{{ $sitesettings[0]->primaryContact ?? '' }}">
                        </div>
                        <div class="form-group">
                            <label for="secondaryContact">Secondary Contact</label>
                            <input type="tel" name="secondaryContact" class="form-control" id="secondaryContact" placeholder="Enter Secondary Contact" value="{{ $sitesettings[0]->secondaryContact ?? '' }}">
                        </div>
                        <div class="form-group">
                            <label for="primaryEmail">Primary Email</label>
                            <input type="email" name="primaryEmail" class="form-control" id="primaryEmail" placeholder="Enter Primary Contact" value="{{ $sitesettings[0]->primaryEmail ?? '' }}">
                        </div>
                        <div class="form-group">
                            <label for="secondaryEmail">Secondary Email</label>
                            <input type="email" name="secondaryEmail" class="form-control" id="secondaryEmail" placeholder="Enter Primary Contact" value="{{ $sitesettings[0]->secondaryEmail ?? '' }}">
                        </div>
                        <div class="form-group">
                            <label for="socialTwitterLink">Social Media Twitter</label>
                            <input type="url" name="socialTwitterLink" class="form-control" id="socialTwitterLink" placeholder="Social Media Twitter Link" value="{{ $sitesettings[0]->socialTwitterLink ?? '' }}">
                        </div>
                        <div class="form-group">
                            <label for="socialFacebookLink">Social Media Facebook</label>
                            <input type="url" name="socialFacebookLink" class="form-control" id="socialFacebookLink" placeholder="Social Media Facebook Link" value="{{ $sitesettings[0]->socialFacebookLink ?? '' }}">
                        </div>
                        <div class="form-group">
                            <label for="socialYoutubeLink">Social Media Facebook</label>
                            <input type="url" name="socialYoutubeLink" class="form-control" id="socialYoutubeLink" placeholder="Social Media Facebook Link" value="{{ $sitesettings[0]->socialYoutubeLink ?? '' }}">
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
