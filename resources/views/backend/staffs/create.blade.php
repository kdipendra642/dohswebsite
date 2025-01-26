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
                    <li class="breadcrumb-item"><a href="{{ route('staffs.index') }}">Staffs</a></li>
                    <li class="breadcrumb-item active"><a href="#">Add Staffs </a></li>
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
                    Staffs
                    <div class="pull-right hidden-phone">
                        <a href="{{ route('staffs.index') }}" class="btn btn-success btn-sm"><i class="fa fa-arrow-left"></i> Go Back</a>
                    </div>
                </header>

                <div class="card-body">
                    <form action="{{ route('staffs.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Staff name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Enter name" value="{{ old('name') }}">
                        </div>
                        <div class="form-group">
                            <label for="telephone">Staff telephone</label>
                            <input type="tel" name="telephone" class="form-control" id="telephone" placeholder="Enter telephone" value="{{ old('telephone') }}">
                        </div>
                        <div class="form-group">
                            <label for="email">Staff Email</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" value="{{ old('email') }}">
                        </div>
                        <div class="form-group">
                            <label for="priority">Priority Order</label>
                            <select name="priority" id="priority" class="form-control">
                                <option disabled selected> --- Please Select ---</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <div class="form-group">
                                <label for="invalidCheck">
                                    Show On Home Page
                                </label>
                                <br>
                                <input type="hidden" name="showOnHomePage" value="0">
                                <input class="form-check-input" type="checkbox" value="1" name="showOnHomePage" id="invalidCheck" style="margin: auto;">
                                <!-- {{-- <input class="form-check-input" type="checkbox" value="1" name="showOnHomePage" id="invalidCheck" style="margin: auto;"> --}} -->
                        </div>

                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="position">Staff position (English)</label>
                                <input type="text" name="position" class="form-control" id="position" placeholder="Enter position" value="{{ old('position') }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="position_nep">Staff position (नेपाली)</label>
                                <input type="text" name="position_nep" class="form-control" id="position_nep" placeholder="Enter position in Nepali" value="{{ old('position_nep') }}">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="division">Staff division (English)</label>
                                <input type="text" name="division" class="form-control" id="division" placeholder="Enter division" value="{{ old('division') }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="division_nep">Staff division (नेपाली)</label>
                                <input type="text" name="division_nep" class="form-control" id="division_nep" placeholder="Enter position in Nepali" value="{{ old('division_nep') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="section">Staff section</label>
                            <input type="text" name="section" class="form-control" id="section" placeholder="Enter section" value="{{ old('section') }}">
                        </div>

                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="section">Staff section (English)</label>
                                <input type="text" name="section" class="form-control" id="section" placeholder="Enter section" value="{{ old('section') }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="section_nep">Staff section (नेपाली)</label>
                                <input type="text" name="section_nep" class="form-control" id="section_nep" placeholder="Enter position in Nepali" value="{{ old('section_nep') }}">
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{ old('description') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="image">Staff photo</label>
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
