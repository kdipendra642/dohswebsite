@extends('frontend.layout.master')
@section('mainContent')

<div class="container content" style="padding:0px;" >

    <div class="section-header">
        <div class="breadcump"><a href="{{ route('index') }}"><i class="fa fa-home fa-lg"></i> </a></div>
    </div>

    <div class="row content detail-body">
        <div class="col-lg-12 col-sm-12 col-xs-12 text-center" style="    margin-bottom: 1%; padding: 10%; border: 1px solid #9b9999; border-radius: 5px;">
            <h1>  404</h1>
            <h2>तपाईले खोजिगर्नु भएको पृष्ठ भेटिएन ।</h2>
            <a href="{{ route('index') }}"> <i class="fa fa-home fa-lg"></i> गृह पृष्ठमा फर्कनुहोस्</a>
        </div>
    </div>
</div>
@endsection