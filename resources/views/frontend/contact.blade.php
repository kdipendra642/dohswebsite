@extends('frontend.layout.master')
@section('mainContent')

<section id="clients" class="wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
    <div class="container content nopad">
        <div class="row">

            <div class="col-lg-3 col-sm-3 col-xs-12">
                <div class="breadcump">
                    <a href="{{ route('index') }}"><i class="fa fa-home fa-lg"></i> </a>  / Contact Us
                </div>
                <h2 class="notice_title">@lang('messages.contact_us')</h2>
                    <img src="{{ asset('assets/frontend/uploads/img/logo.png')}}" alt="{{$contactPageData['sitesettings']->titleThree}}" class="img-fluid img-logo" style="padding-left:4px">
                <p>
                    @if ($contactPageData['currentLocale'] == 'en')
                    <h2><b>{{$contactPageData['sitesettings']->titleThree}}</b></h2>
                    <span style="font-size: 1rem;">Address: {{$contactPageData['sitesettings']->address}}</span> <br>
                    <span style="font-size: 1rem;">Phone: </span>{{$contactPageData['sitesettings']->primaryContact }}, {{$contactPageData['sitesettings']->secondaryContact}}<br>
                    <span style="font-size: 1rem;">Website: </span><a href="{{route('index')}}" target="_blank">{{route('index')}}</a><span style="font-size: 1rem;"><br></span>
                    <span style="font-size: 1rem;">Email: {{$contactPageData['sitesettings']->primaryEmail }}, {{$contactPageData['sitesettings']->secondaryEmail }}<br></span>
                    @else
                    <h2><b>{{$contactPageData['sitesettings']->titleFour_nep}}</b></h2>
                    <span style="font-size: 1rem;">Address: {{$contactPageData['sitesettings']->address_nep}}</span> <br>
                    <span style="font-size: 1rem;">Phone: </span>{{$contactPageData['sitesettings']->primaryContact }}, {{$contactPageData['sitesettings']->secondaryContact}}<br>
                    <span style="font-size: 1rem;">Website: </span><a href="{{route('index')}}" target="_blank">{{route('index')}}</a><span style="font-size: 1rem;"><br></span>
                    <span style="font-size: 1rem;">Email: {{$contactPageData['sitesettings']->primaryEmail }}, {{$contactPageData['sitesettings']->secondaryEmail }}<br></span>
                    @endif
                </p>
            </div>

            <div class="col-lg-9 col-sm-9 col-xs-12" style="padding-top: 15px;">
                <h2 class="notice_title">
                    @lang('messages.send_your_feedback')
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
                                <div class="form-group">
                                    <div class="captch">
                                        <span>{!! captcha_img() !!}</span>
                                       <input type="text" name="captcha" class="form-control @error('captcha') is-invalid @enderror" placeholder="Please Insert Captch">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <button class="btn btn-primary" type="submit">@lang('messages.submit_your_feedback')</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
