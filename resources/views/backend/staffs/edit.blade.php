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
                    <form action="{{ route('staffs.update', $staffs->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="name">Staff name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Enter name" value="{{ $staffs->name }}">
                        </div>
                        <div class="form-group">
                            <label for="telephone">Staff telephone</label>
                            <input type="tel" name="telephone" class="form-control" id="telephone" placeholder="Enter telephone" value="{{ $staffs->telephone }}">
                        </div>
                        <div class="form-group">
                            <label for="email">Staff Email</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" value="{{ $staffs->email }}">
                        </div>
                        <div class="form-group">
                            <label for="priority">Priority Order</label>
                            <select name="priority" id="priority" class="form-control">
                                <option disabled> --- Please Select ---</option>
                                <option value="1"  @if ($staffs->priority == 1) selected @endif>1</option>
                                <option value="2"  @if ($staffs->priority == 2) selected @endif>2</option>
                                <option value="3"  @if ($staffs->priority == 3) selected @endif>3</option>
                                <option value="4"  @if ($staffs->priority == 4) selected @endif>4</option>
                                <option value="5"  @if ($staffs->priority == 5) selected @endif>5</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="invalidCheck">
                                Show On Home Page
                            </label>
                            <br>
                            <input type="hidden" name="showOnHomePage" value="0">
                            <input class="form-check-input" type="checkbox" value="1" @if ($staffs->showOnHomePage == 1) checked @endif name="showOnHomePage" id="invalidCheck" style="margin: auto;">
                            {{-- <input class="form-check-input" type="checkbox" value="1" name="showOnHomePage" id="invalidCheck" style="margin: auto;"> --}}
                    </div>
                        <div class="form-group">
                            <label for="position">Staff position</label>
                            <input type="text" name="position" class="form-control" id="position" placeholder="Enter position" value="{{ $staffs->position }}">
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="position">Staff position (English)</label>
                                <input type="text" name="position" class="form-control" id="position" placeholder="Enter position" value="{{ $staffs->position }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="position_nep">Staff position (नेपाली)</label>
                                <input type="text" name="position_nep" class="form-control" id="position_nep" placeholder="Enter position in Nepali" value="{{ $staffs->position_nep }}">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="division">Staff division (English)</label>
                                <input type="text" name="division" class="form-control" id="division" placeholder="Enter division" value="{{ $staffs->division }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="division_nep">Staff division (नेपाली)</label>
                                <input type="text" name="division_nep" class="form-control" id="division_nep" placeholder="Enter position in Nepali" value="{{ $staffs->division_nep }}">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="section">Staff section (English)</label>
                                <input type="text" name="section" class="form-control" id="section" placeholder="Enter section" value="{{ $staffs->section }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="section_nep">Staff section (नेपाली)</label>
                                <input type="text" name="section_nep" class="form-control" id="section_nep" placeholder="Enter position in Nepali" value="{{ $staffs->section_nep }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{ old('description') }}</textarea>
                        </div>
                        <div class="form-group">

                            <label for="image">Staff photo</label>
                            <input type="file" id="image" name="image">

                            <div>
                                <label>Old File</label>
                                <br>
                                @if ($staffs->getMedia('staffs')->isNotEmpty())
                                    <div class="card-body">
                                        <ul class="grid cs-style-3">
                                            <li>
                                            @if (
                                                        $staffs->getMedia('staffs')[0]->mime_type == 'image/png'
                                                        || $staffs->getMedia('staffs')[0]->mime_type == 'image/jpeg'
                                                        || $staffs->getMedia('staffs')[0]->mime_type == 'image/jpg'
                                                    )
                                                <figure>
                                                    <img src="{{$staffs->getMedia('staffs')[0]->getUrl()}}" alt="{{$staffs->name}}" style="width: 25%; height: 25%;">
                                                    <figcaption>
                                                        <h3>{{$staffs->getMedia('staffs')[0]->name}}</h3>
                                                        <!-- <a class="fancybox" rel="group" href="img/gallery/3.jpg">Take a look</a> -->
                                                    </figcaption>
                                                    <a href="{{ route('delete.image', $staffs->getMedia('staffs')[0]->id) }}" class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete</a>
                                                </figure>
                                                @else
                                                <a href="#">{{$staffs->getMedia('staffs')[0]->name}}</a>                                
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
