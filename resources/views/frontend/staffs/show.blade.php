@extends('frontend.layout.master')
@section('mainContent')

<section id="clients" class="wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
    <div class="container content nopad">
        <div class="row">
            <div class="col-lg-9 col-sm-9 col-xs-12 page-detail">
                <div class="breadcump">
                    <a href="{{route('index') }}"><i class="fa fa-home fa-lg"></i> </a>  / {{$staff->name}}
                </div>
                <div class="page">
                  
                    <div class="subheader-social">

                        <h3 class="text-left">
                            <i class="fas fa-edit"></i>
                            Updated at
                            <small>
                                <i class="fa fa-clock"></i>
                                {{ Carbon\Carbon::parse($staff->created_at)->format('d F, Y, l')}}
                            </small>
                        </h3>

                    </div>
                    @if ($staff->getMedia('staffs')->isNotEmpty())

                        @if (
                            $staff->getMedia('staffs')[0]->mime_type == 'image/png'
                            || $staff->getMedia('staffs')[0]->mime_type == 'image/jpeg'
                            || $staff->getMedia('staffs')[0]->mime_type == 'image/jpg'
                        )
                        <img src="{{$staff->getMedia('staffs')[0]->getUrl()}}" alt="{{$staff->title}}" class="img-thumbnail" style="width: 50%; height: 50%;">
                        @endif

                    @endif
                    <h1>{{$staff->name}}</h1>
                    <p>{{$staff->position}}</p>
                    <p>
                        {!! $staff->description !!}
                    </p>
                </div>
            </div>

            <!-- sidebar starts here -->
            <div class="col-lg-3 col-sm-3 col-xs-12">
                @include('frontend.includes.sidebar')
          
            <!-- sidebar ends here -->

        </div>
    </div>
</section>


@endsection
