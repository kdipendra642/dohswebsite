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
                            <select name="position" id="position" class="form-control">
                                <option value="" >Please Select</option>
                                <option value="Director General" @if ($staffs->position == 'Director General') selected @endif>Director General</option>
                                <option value="Computer Operator" @if ($staffs->position == 'Computer Operator') selected @endif>Computer Operator</option>
                                <option value="Assistant Fourth" @if ($staffs->position == 'Assistant Fourth') selected @endif>Assistant Fourth</option>
                                <option value="Joint Secretary" @if ($staffs->position == 'Joint Secretary') selected @endif>Joint Secretary</option>
                                <option value="Environment Inspector" @if ($staffs->position == 'Environment Inspector') selected @endif>Environment Inspector</option>
                                <option value="Section Officer" @if ($staffs->position == 'Section Officer') selected @endif>Section Officer</option>
                                <option value="Computer Officer" @if ($staffs->position == 'Computer Officer') selected @endif>Computer Officer</option>
                                <option value="Senior Divisional Chemical Engineer" @if ($staffs->position == 'Senior Divisional Chemical Engineer') selected @endif>Senior Divisional Chemical Engineer</option>
                                <option value="Senior Divisional Mechanical Engineer" @if ($staffs->position == 'Senior Divisional Mechanical Engineer') selected @endif>Senior Divisional Mechanical Engineer</option>
                                <option value="Mechanical Engineer" @if ($staffs->position == 'Mechanical Engineer') selected @endif>Mechanical Engineer</option>
                                <option value="Under Secretary (Account)" @if ($staffs->position == 'Under Secretary (Account)') selected @endif>Under Secretary (Account)</option>
                                <option value="Legal Officer" @if ($staffs->position == 'Legal Officer') selected @endif>Legal Officer</option>
                                <option value="Account Officer" @if ($staffs->position == 'Account Officer') selected @endif>Account Officer</option>
                                <option value="Joint Secretary (Spokesperson)" @if ($staffs->position == 'Joint Secretary (Spokesperson)') selected @endif>Joint Secretary (Spokesperson)</option>
                                <option value="Library Officer" @if ($staffs->position == 'Library Officer') selected @endif>Library Officer</option>
                                <option value="Under Secretary" @if ($staffs->position == 'Under Secretary') selected @endif>Under Secretary</option>
                                <option value="Civil Engineer" @if ($staffs->position == 'Civil Engineer') selected @endif>Civil Engineer</option>
                                <option value="Computer Operater" @if ($staffs->position == 'Computer Operater') selected @endif>Computer Operater</option>
                                <option value="Computer Engineer" @if ($staffs->position == 'Computer Engineer') selected @endif>Computer Engineer</option>
                                <option value="Typist Kharidar" @if ($staffs->position == 'Typist Kharidar') selected @endif>Typist Kharidar</option>
                                <option value="Computer Technician" @if ($staffs->position == 'Computer Technician') selected @endif>Computer Technician</option>
                                <option value="Accountant" @if ($staffs->position == 'Accountant') selected @endif>Accountant</option>
                                <option value="Under Secretary (Information Officer)" @if ($staffs->position == 'Under Secretary (Information Officer)') selected @endif>Under Secretary (Information Officer)</option>
                                <option value="Honorable Minister" @if ($staffs->position == 'Honorable Minister') selected @endif>Honorable Minister</option>
                                <option value="Nayab Subba" @if ($staffs->position == 'Nayab Subba') selected @endif>Nayab Subba</option>
                                <option value="Assistant Manager" @if ($staffs->position == 'Assistant Manager') selected @endif>Assistant Manager</option>
                                <option value="Secretary" @if ($staffs->position == 'Secretary') selected @endif>Secretary</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="division">Staff division</label>
                            <select name="division" id="division" class="form-control">
                                <option value="" >Please Select</option>
                                <option value="Registration Section" @if ($staffs->division == 'Registration Section') selected @endif>Registration Section</option>
                                <option value="Commerce Secretariat" @if ($staffs->division == 'Commerce Secretariat') selected @endif>Commerce Secretariat</option>
                                <option value="Multilateral Trade Section" @if ($staffs->division == 'Multilateral Trade Section') selected @endif>Multilateral Trade Section</option>
                                <option value="Account Section" @if ($staffs->division == 'Account Section') selected @endif>Account Section</option>
                                <option value="Industrial Infrastructure Section" @if ($staffs->division == 'Industrial Infrastructure Section') selected @endif>Industrial Infrastructure Section</option>
                                <option value="Industry Secretariat" @if ($staffs->division == 'Industry Secretariat') selected @endif>Industry Secretariat</option>
                                <option value="Industrial Standards and Technology Section" @if ($staffs->division == 'Industrial Standards and Technology Section') selected @endif>Industrial Standards and Technology Section</option>
                                <option value="Bilateral Trade And Transport (China) Section" @if ($staffs->division == 'Bilateral Trade And Transport (China) Section') selected @endif>Bilateral Trade And Transport (China) Section</option>
                                <option value="Cottage, Samall And Medium Industry Promotion Section" @if ($staffs->division == 'Cottage, Samall And Medium Industry Promotion Section') selected @endif>Cottage, Samall And Medium Industry Promotion Section</option>
                                <option value="Supply Chain And Consumer Interest Protection Division" @if ($staffs->division == 'Supply Chain And Consumer Interest Protection Division') selected @endif>Supply Chain And Consumer Interest Protection Division</option>
                                <option value="Monitoring And Evaluation Section" @if ($staffs->division == 'Monitoring And Evaluation Section') selected @endif>Monitoring And Evaluation Section</option>
                                <option value="Supply Policy And Regulation Section" @if ($staffs->division == 'Supply Policy And Regulation Section') selected @endif>Supply Policy And Regulation Section</option>
                                <option value="Industrial Policy And Facilitation Section" @if ($staffs->division == 'Industrial Policy And Facilitation Section') selected @endif>Industrial Policy And Facilitation Section</option>
                                <option value="Regional And Other Bilateral Trade And Transit Section" @if ($staffs->division == 'Regional And Other Bilateral Trade And Transit Section') selected @endif>Regional And Other Bilateral Trade And Transit Section</option>
                                <option value="Bilateral Trade And Transport (India) Section" @if ($staffs->division == 'Bilateral Trade And Transport (India) Section') selected @endif>Bilateral Trade And Transport (India) Section</option>
                                <option value="Export Promotion And Trade Facilitation Section" @if ($staffs->division == 'Export Promotion And Trade Facilitation Section') selected @endif>Export Promotion And Trade Facilitation Section</option>
                                <option value="Industrial Standards And Technology Section" @if ($staffs->division == 'Industrial Standards And Technology Section') selected @endif>Industrial Standards And Technology Section</option>
                                <option value="Consumer Interest Protection And Coordination Section" @if ($staffs->division == 'Consumer Interest Protection And Coordination Section') selected @endif>Consumer Interest Protection And Coordination Section</option>
                                <option value="Multilateral Trade And Trade Cooperation Division" @if ($staffs->division == 'Multilateral Trade And Trade Cooperation Division') selected @endif>Multilateral Trade And Trade Cooperation Division</option>
                                <option value="Secretariat Of Ministry" @if ($staffs->division == 'Secretariat Of Ministry') selected @endif>Secretariat Of Ministry</option>
                                <option value="Administration Section" @if ($staffs->division == 'Administration Section') selected @endif>Administration Section</option>
                                <option value="Industrial and Investment Promotion Division" @if ($staffs->division == 'Industrial and Investment Promotion Division') selected @endif>Industrial and Investment Promotion Division</option>
                                <option value="Secretariat of Ministry" @if ($staffs->division == 'Secretariat of Ministry') selected @endif>Secretariat of Ministry</option>
                                <option value="प्रशासन तथा संस्थान महाशाखा" @if ($staffs->division == 'प्रशासन तथा संस्थान महाशाखा') selected @endif>प्रशासन तथा संस्थान महाशाखा</option>
                                <option value="Foreign Investment And Intellectual Property Section" @if ($staffs->division == 'Foreign Investment And Intellectual Property Section') selected @endif>Foreign Investment And Intellectual Property Section</option>
                                <option value="औद्योगिक तथा लगानी प्रवर्द्बन महाशाखा" @if ($staffs->division == 'औद्योगिक तथा लगानी प्रवर्द्बन महाशाखा') selected @endif>औद्योगिक तथा लगानी प्रवर्द्बन महाशाखा</option>
                                <option value="Secretariat of Minister" @if ($staffs->division == 'Secretariat of Minister') selected @endif>Secretariat of Minister</option>
                                <option value="Law And Decision Enforcement Section" @if ($staffs->division == 'Law And Decision Enforcement Section') selected @endif>Law And Decision Enforcement Section</option>
                                <option value="Supply Policy and Regulation Section" @if ($staffs->division == 'Supply Policy and Regulation Section') selected @endif>Supply Policy and Regulation Section</option>
                                <option value="Trade Policy And Trade Cooperation Division" @if ($staffs->division == 'Trade Policy And Trade Cooperation Division') selected @endif>Trade Policy And Trade Cooperation Division</option>
                                <option value="Information Technology Section" @if ($staffs->division == 'Information Technology Section') selected @endif>Information Technology Section</option>
                                <option value="Administration And Corporation Division" @if ($staffs->division == 'Administration And Corporation Division') selected @endif>Administration And Corporation Division</option>
                                <option value="Industrial Infrastructure And Environment Division" @if ($staffs->division == 'Industrial Infrastructure And Environment Division') selected @endif>Industrial Infrastructure And Environment Division</option>
                                <option value="Planning And Budget Management Section" @if ($staffs->division == 'Planning And Budget Management Section') selected @endif>Planning And Budget Management Section</option>
                                <option value="Bilateral And Regional Trade Division" @if ($staffs->division == 'Bilateral And Regional Trade Division') selected @endif>Bilateral And Regional Trade Division</option>
                                <option value="Market Research And Regulation Section" @if ($staffs->division == 'Market Research And Regulation Section') selected @endif>Market Research And Regulation Section</option>
                                <option value="Administration & Corporation Division" @if ($staffs->division == 'Administration & Corporation Division') selected @endif>Administration & Corporation Division</option>
                                <option value="Government Industry And Corporation Section" @if ($staffs->division == 'Government Industry And Corporation Section') selected @endif>Government Industry And Corporation Section</option>
                                <option value="Environment Section" @if ($staffs->division == 'Environment Section') selected @endif>Environment Section</option>
                                <option value="Planning, Monitoring And Evaluation Division" @if ($staffs->division == 'Planning, Monitoring And Evaluation Division') selected @endif>Planning, Monitoring And Evaluation Division</option>
                                <option value="Store Section" @if ($staffs->division == 'Store Section') selected @endif>Store Section</option>
                                <option value="Industrial Infrastructure and Environment Division" @if ($staffs->division == 'Industrial Infrastructure and Environment Division') selected @endif>Industrial Infrastructure and Environment Division</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="section">Staff section</label>
                            <select name="section" id="section" class="form-control">
                                <option value="">Please Select</option>
                                <option value="Registration Section" @if ($staffs->section == 'Registration Section') selected @endif>Registration Section</option>
                                <option value="Commerce Secretariat" @if ($staffs->section == 'Commerce Secretariat') selected @endif>Commerce Secretariat</option>
                                <option value="Multilateral Trade Section" @if ($staffs->section == 'Multilateral Trade Section') selected @endif>Multilateral Trade Section</option>
                                <option value="Account Section" @if ($staffs->section == 'Account Section') selected @endif>Account Section</option>
                                <option value="Industrial Infrastructure Section" @if ($staffs->section == 'Industrial Infrastructure Section') selected @endif>Industrial Infrastructure Section</option>
                                <option value="Industry Secretariat" @if ($staffs->section == 'Industry Secretariat') selected @endif>Industry Secretariat</option>
                                <option value="Industrial Standards and Technology Section" @if ($staffs->section == 'Industrial Standards and Technology Section') selected @endif>Industrial Standards and Technology Section</option>
                                <option value="Bilateral Trade And Transport (China) Section" @if ($staffs->section == 'Bilateral Trade And Transport (China) Section') selected @endif>Bilateral Trade And Transport (China) Section</option>
                                <option value="Cottage, Samall And Medium Industry Promotion Section" @if ($staffs->section == 'Cottage, Samall And Medium Industry Promotion Section') selected @endif>Cottage, Samall And Medium Industry Promotion Section</option>
                                <option value="Supply Chain And Consumer Interest Protection Division" @if ($staffs->section == 'Supply Chain And Consumer Interest Protection Division') selected @endif>Supply Chain And Consumer Interest Protection Division</option>
                                <option value="Monitoring And Evaluation Section" @if ($staffs->section == 'Monitoring And Evaluation Section') selected @endif>Monitoring And Evaluation Section</option>
                                <option value="Supply Policy And Regulation Section" @if ($staffs->section == 'Supply Policy And Regulation Section') selected @endif>Supply Policy And Regulation Section</option>
                                <option value="Industrial Policy And Facilitation Section" @if ($staffs->section == 'Industrial Policy And Facilitation Section') selected @endif>Industrial Policy And Facilitation Section</option>
                                <option value="Regional And Other Bilateral Trade And Transit Section" @if ($staffs->section == 'Regional And Other Bilateral Trade And Transit Section') selected @endif>Regional And Other Bilateral Trade And Transit Section</option>
                                <option value="Bilateral Trade And Transport (India) Section" @if ($staffs->section == 'Bilateral Trade And Transport (India) Section') selected @endif>Bilateral Trade And Transport (India) Section</option>
                                <option value="Export Promotion And Trade Facilitation Section" @if ($staffs->section == 'Export Promotion And Trade Facilitation Section') selected @endif>Export Promotion And Trade Facilitation Section</option>
                                <option value="Industrial Standards And Technology Section" @if ($staffs->section == 'Industrial Standards And Technology Section') selected @endif>Industrial Standards And Technology Section</option>
                                <option value="Consumer Interest Protection And Coordination Section" @if ($staffs->section == 'Consumer Interest Protection And Coordination Section') selected @endif>Consumer Interest Protection And Coordination Section</option>
                                <option value="Multilateral Trade And Trade Cooperation Division" @if ($staffs->section == 'Multilateral Trade And Trade Cooperation Division') selected @endif>Multilateral Trade And Trade Cooperation Division</option>
                                <option value="Secretariat Of Ministry" @if ($staffs->section == 'Secretariat Of Ministry') selected @endif>Secretariat Of Ministry</option>
                                <option value="Administration Section" @if ($staffs->section == 'Administration Section') selected @endif>Administration Section</option>
                                <option value="Industrial and Investment Promotion Division" @if ($staffs->section == 'Industrial and Investment Promotion Division') selected @endif>Industrial and Investment Promotion Division</option>
                                <option value="Secretariat of Ministry" @if ($staffs->section == 'Secretariat of Ministry') selected @endif>Secretariat of Ministry</option>
                                <option value="प्रशासन तथा संस्थान महाशाखा" @if ($staffs->section == 'प्रशासन तथा संस्थान महाशाखा') selected @endif>प्रशासन तथा संस्थान महाशाखा</option>
                                <option value="Foreign Investment And Intellectual Property Section" @if ($staffs->section == 'Foreign Investment And Intellectual Property Section') selected @endif>Foreign Investment And Intellectual Property Section</option>
                                <option value="औद्योगिक तथा लगानी प्रवर्द्बन महाशाखा" @if ($staffs->section == 'औद्योगिक तथा लगानी प्रवर्द्बन महाशाखा') selected @endif>औद्योगिक तथा लगानी प्रवर्द्बन महाशाखा</option>
                                <option value="Secretariat of Minister" @if ($staffs->section == 'Secretariat of Minister') selected @endif>Secretariat of Minister</option>
                                <option value="Law And Decision Enforcement Section" @if ($staffs->section == 'Law And Decision Enforcement Section') selected @endif>Law And Decision Enforcement Section</option>
                                <option value="Supply Policy and Regulation Section" @if ($staffs->section == 'Supply Policy and Regulation Section') selected @endif>Supply Policy and Regulation Section</option>
                                <option value="Trade Policy And Trade Cooperation Division" @if ($staffs->section == 'Trade Policy And Trade Cooperation Division') selected @endif>Trade Policy And Trade Cooperation Division</option>
                                <option value="Information Technology Section" @if ($staffs->section == 'Information Technology Section') selected @endif>Information Technology Section</option>
                                <option value="Administration And Corporation Division" @if ($staffs->section == 'Administration And Corporation Division') selected @endif>Administration And Corporation Division</option>
                                <option value="Industrial Infrastructure And Environment Division" @if ($staffs->section == 'Industrial Infrastructure And Environment Division') selected @endif>Industrial Infrastructure And Environment Division</option>
                                <option value="Planning And Budget Management Section" @if ($staffs->section == 'Planning And Budget Management Section') selected @endif>Planning And Budget Management Section</option>
                                <option value="Bilateral And Regional Trade Division" @if ($staffs->section == 'Bilateral And Regional Trade Division') selected @endif>Bilateral And Regional Trade Division</option>
                                <option value="Market Research And Regulation Section" @if ($staffs->section == 'Market Research And Regulation Section') selected @endif>Market Research And Regulation Section</option>
                                <option value="Administration & Corporation Division" @if ($staffs->section == 'Administration & Corporation Division') selected @endif>Administration & Corporation Division</option>
                                <option value="Government Industry And Corporation Section" @if ($staffs->section == 'Government Industry And Corporation Section') selected @endif>Government Industry And Corporation Section</option>
                                <option value="Environment Section" @if ($staffs->section == 'Environment Section') selected @endif>Environment Section</option>
                                <option value="Planning, Monitoring And Evaluation Division" @if ($staffs->section == 'Planning, Monitoring And Evaluation Division') selected @endif>Planning, Monitoring And Evaluation Division</option>
                                <option value="Store Section" @if ($staffs->section == 'Store Section') selected @endif>Store Section</option>
                                <option value="Industrial Infrastructure and Environment Division" @if ($staffs->section == 'Industrial Infrastructure and Environment Division') selected @endif>Industrial Infrastructure and Environment Division</option>
                            </select>
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
