@extends('frontend.layout.master')
@section('mainContent')

<section id="clients" class="wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
    <div class="container content nopad">
        <div class="row">

            <div class="col-lg-3 col-sm-3 col-xs-12">
                <div class="breadcump">
                    <a href="{{ route('index') }}"><i class="fa fa-home fa-lg"></i> </a>  / Contact Us
                </div>
                <h2 class="notice_title">Contact Us</h2>
                    <img src="{{ asset('assets/frontend/uploads/img/logo.png')}}" alt="{{$contactPageData['sitesettings']->titleThree}}" class="img-fluid img-logo" style="padding-left:4px">
                <p>
                    <p>
                        <h2><b>{{$contactPageData['sitesettings']->titleThree}}</b></h2>
                            <h3 style="font-size:24px;">{{$contactPageData['sitesettings']->address}}</h3>
                            <span style="font-size: 1rem;">Phone: </span>{{$contactPageData['sitesettings']->primaryContact }}, {{$contactPageData['sitesettings']->secondaryContact}}<br>
                            <span style="font-size: 1rem;">Website: </span><a href="{{route('index')}}" target="_blank">{{route('index')}}</a><span style="font-size: 1rem;"><br></span>
                            <span style="font-size: 1rem;">Email: {{$contactPageData['sitesettings']->primaryEmail }}, {{$contactPageData['sitesettings']->secondaryEmail }}<br></span>
                    </p>
                </p>
            </div>

            <div class="col-lg-9 col-sm-9 col-xs-12" style="padding-top: 15px;">
                <h2 class="notice_title">
                    Send Us Your Feedback
                    <hr>
                </h2>

              
               
                <div class="page">
                    <form action="{{ route('messages.store') }}" method="POST">
                        @csrf
                        <div class="row">

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input class="form-control" type="text" placeholder="Enter Your Name" name="name">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input class="form-control" type="email" placeholder="Enter Your Email" name="email">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input class="form-control" type="tel" placeholder="Enter Your Phone Number" name="phone">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input class="form-control" type="text" placeholder="Subject" name="subject">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <textarea name="message" class="form-control" placeholder="Your message here..." rows="5"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <button class="btn btn-primary" type="submit">Submit Your Message</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
            
        </div>
    </div>
</section>



@endsection