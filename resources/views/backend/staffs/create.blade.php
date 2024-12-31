@extends('backend.layout.master')

@section('mainContent')

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
                                <label for="invalidCheck">
                                    Show On Home Page
                                </label>
                                <br>
                                <input type="hidden" name="showOnHomePage" value="0">
                                <input class="form-check-input" type="checkbox" value="1" name="showOnHomePage" id="invalidCheck" style="margin: auto;">
                                {{-- <input class="form-check-input" type="checkbox" value="1" name="showOnHomePage" id="invalidCheck" style="margin: auto;"> --}}
                        </div>
                        <div class="form-group">
                            <label for="position">Staff position</label>
                            <select name="position" id="position" class="form-control">
                                <option value="Please Select" selected disabled>Please Select</option>
                                <option value="Computer Operator">Computer Operator</option>
                                <option value="Assistant Fourth">Assistant Fourth</option>
                                <option value="Joint Secretary">Joint Secretary</option>
                                <option value="Environment Inspector">Environment Inspector</option>
                                <option value="Section officer">Section officer</option>
                                <option value="Computer Officer">Computer Officer</option>
                                <option value="Senior Divisional Chemical Engineer">Senior Divisional Chemical Engineer</option>
                                <option value="Senior Divisional Mechanical Engineer">Senior Divisional Mechanical Engineer</option>
                                <option value="Mechanical Engineer">Mechanical Engineer</option>
                                <option value="Under Secretary (Account)">Under Secretary (Account)</option>
                                <option value="Legal Officer">Legal Officer</option>
                                <option value="Account Officer">Account Officer</option>
                                <option value="Joint Secretary (Spokesperson)">Joint Secretary (Spokesperson)</option>
                                <option value="Library Officer">Library Officer</option>
                                <option value="Under Secretary">Under Secretary</option>
                                <option value="Civil Engineer">Civil Engineer</option>
                                <option value="Computer Operater">Computer Operater</option>
                                <option value="Computer Engineer">Computer Engineer</option>
                                <option value="Typist Kharidar">Typist Kharidar</option>
                                <option value="Computer Technician">Computer Technician</option>
                                <option value="Accountant">Accountant</option>
                                <option value="Under Secretary (Information Officer)">Under Secretary (Information Officer)</option>
                                <option value="Honorable Minister">Honorable Minister</option>
                                <option value="Section Officer">Section Officer</option>
                                <option value="Nayab Subba">Nayab Subba</option>
                                <option value="Assistant Manager">Assistant Manager</option>
                                <option value="Secretary">Secretary</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="division">Staff division</label>
                            <select name="division" id="division" class="form-control">
                                <option value="Please Select" selected disabled>Please Select</option>
                                <option value="Registration Section">Registration Section</option>
                                <option value="Commerce Secretariat">Commerce Secretariat</option>
                                <option value="Multilateral Trade Section">Multilateral Trade Section</option>
                                <option value="Account Section">Account Section</option>
                                <option value="Industrial Infrastructure Section">Industrial Infrastructure Section</option>
                                <option value="Industry Secretariat">Industry Secretariat</option>
                                <option value="Industrial Standards and Technology Section">Industrial Standards and Technology Section</option>
                                <option value="Bilateral Trade And Transport (China) Section">Bilateral Trade And Transport (China) Section</option>
                                <option value="Cottage, Samall And Medium Industry Promotion Section">Cottage, Samall And Medium Industry Promotion Section</option>
                                <option value="Supply Chain And Consumer Interest Protection Division">Supply Chain And Consumer Interest Protection Division</option>
                                <option value="Monitoring And Evaluation Section">Monitoring And Evaluation Section</option>
                                <option value="Supply Policy And Regulation Section">Supply Policy And Regulation Section</option>
                                <option value="Industrial Policy And Facilitation Section">Industrial Policy And Facilitation Section</option>
                                <option value="Regional And Other Bilateral Trade And Transit Section">Regional And Other Bilateral Trade And Transit Section</option>
                                <option value="Bilateral Trade And Transport (India) Section">Bilateral Trade And Transport (India) Section</option>
                                <option value="Export Promotion And Trade Facilitation Section">Export Promotion And Trade Facilitation Section</option>
                                <option value="Industrial Standards And Technology Section">Industrial Standards And Technology Section</option>
                                <option value="Consumer Interest Protection And Coordination Section">Consumer Interest Protection And Coordination Section</option>
                                <option value="Multilateral Trade And Trade Cooperation Division">Multilateral Trade And Trade Cooperation Division</option>
                                <option value="Secretariat Of Ministry">Secretariat Of Ministry</option>
                                <option value="Administration Section">Administration Section</option>
                                <option value="Industrial and Investment Promotion Division">Industrial and Investment Promotion Division</option>
                                <option value="Secretariat of Ministry">Secretariat of Ministry</option>
                                <option value="प्रशासन तथा संस्थान महाशाखा">प्रशासन तथा संस्थान महाशाखा</option>
                                <option value="Foreign Investment And Intellectual Property Section">Foreign Investment And Intellectual Property Section</option>
                                <option value="औद्योगिक तथा लगानी प्रवर्द्बन महाशाखा">औद्योगिक तथा लगानी प्रवर्द्बन महाशाखा</option>
                                <option value="Secretariat of Minister">Secretariat of Minister</option>
                                <option value="Law And Decision Enforcement Section">Law And Decision Enforcement Section</option>
                                <option value="Supply Policy and Regulation Section">Supply Policy and Regulation Section</option>
                                <option value="Trade Policy And Trade Cooperation Division">Trade Policy And Trade Cooperation Division</option>
                                <option value="Information Technology Section">Information Technology Section</option>
                                <option value="Administration And Corporation Division">Administration And Corporation Division</option>
                                <option value="Industrial Infrastructure And Environment Division">Industrial Infrastructure And Environment Division</option>
                                <option value="Planning And Budget Management Section">Planning And Budget Management Section</option>
                                <option value="Bilateral And Regional Trade Division">Bilateral And Regional Trade Division</option>
                                <option value="Market Research And Regulation Section">Market Research And Regulation Section</option>
                                <option value="Administration & Corporation Division">Administration & Corporation Division</option>
                                <option value="Government Industry And Corporation Section">Government Industry And Corporation Section</option>
                                <option value="Environment Section">Environment Section</option>
                                <option value="Planning, Monitoring And Evaluation Division">Planning, Monitoring And Evaluation Division</option>
                                <option value="Store Section">Store Section</option>
                                <option value="Industrial Infrastructure and Environment Division">Industrial Infrastructure and Environment Division</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="section">Staff section</label>
                            <select name="section" id="section" class="form-control">
                                <option value="Please Select" selected disabled>Please Select</option>
                                <option value="Registration Section">Registration Section</option>
                                <option value="Commerce Secretariat">Commerce Secretariat</option>
                                <option value="Multilateral Trade Section">Multilateral Trade Section</option>
                                <option value="Account Section">Account Section</option>
                                <option value="Industrial Infrastructure Section">Industrial Infrastructure Section</option>
                                <option value="Industry Secretariat">Industry Secretariat</option>
                                <option value="Industrial Standards and Technology Section">Industrial Standards and Technology Section</option>
                                <option value="Bilateral Trade And Transport (China) Section">Bilateral Trade And Transport (China) Section</option>
                                <option value="Cottage, Samall And Medium Industry Promotion Section">Cottage, Samall And Medium Industry Promotion Section</option>
                                <option value="Supply Chain And Consumer Interest Protection Division">Supply Chain And Consumer Interest Protection Division</option>
                                <option value="Monitoring And Evaluation Section">Monitoring And Evaluation Section</option>
                                <option value="Supply Policy And Regulation Section">Supply Policy And Regulation Section</option>
                                <option value="Industrial Policy And Facilitation Section">Industrial Policy And Facilitation Section</option>
                                <option value="Regional And Other Bilateral Trade And Transit Section">Regional And Other Bilateral Trade And Transit Section</option>
                                <option value="Bilateral Trade And Transport (India) Section">Bilateral Trade And Transport (India) Section</option>
                                <option value="Export Promotion And Trade Facilitation Section">Export Promotion And Trade Facilitation Section</option>
                                <option value="Industrial Standards And Technology Section">Industrial Standards And Technology Section</option>
                                <option value="Consumer Interest Protection And Coordination Section">Consumer Interest Protection And Coordination Section</option>
                                <option value="Multilateral Trade And Trade Cooperation Division">Multilateral Trade And Trade Cooperation Division</option>
                                <option value="Secretariat Of Ministry">Secretariat Of Ministry</option>
                                <option value="Administration Section">Administration Section</option>
                                <option value="Industrial and Investment Promotion Division">Industrial and Investment Promotion Division</option>
                                <option value="Secretariat of Ministry">Secretariat of Ministry</option>
                                <option value="प्रशासन तथा संस्थान महाशाखा">प्रशासन तथा संस्थान महाशाखा</option>
                                <option value="Foreign Investment And Intellectual Property Section">Foreign Investment And Intellectual Property Section</option>
                                <option value="औद्योगिक तथा लगानी प्रवर्द्बन महाशाखा">औद्योगिक तथा लगानी प्रवर्द्बन महाशाखा</option>
                                <option value="Secretariat of Minister">Secretariat of Minister</option>
                                <option value="Law And Decision Enforcement Section">Law And Decision Enforcement Section</option>
                                <option value="Supply Policy and Regulation Section">Supply Policy and Regulation Section</option>
                                <option value="Trade Policy And Trade Cooperation Division">Trade Policy And Trade Cooperation Division</option>
                                <option value="Information Technology Section">Information Technology Section</option>
                                <option value="Administration And Corporation Division">Administration And Corporation Division</option>
                                <option value="Industrial Infrastructure And Environment Division">Industrial Infrastructure And Environment Division</option>
                                <option value="Planning And Budget Management Section">Planning And Budget Management Section</option>
                                <option value="Bilateral And Regional Trade Division">Bilateral And Regional Trade Division</option>
                                <option value="Market Research And Regulation Section">Market Research And Regulation Section</option>
                                <option value="Administration & Corporation Division">Administration & Corporation Division</option>
                                <option value="Government Industry And Corporation Section">Government Industry And Corporation Section</option>
                                <option value="Environment Section">Environment Section</option>
                                <option value="Planning, Monitoring And Evaluation Division">Planning, Monitoring And Evaluation Division</option>
                                <option value="Store Section">Store Section</option>
                                <option value="Industrial Infrastructure and Environment Division">Industrial Infrastructure and Environment Division</option>
                            </select>
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

@endsection
