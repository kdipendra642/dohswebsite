@extends('frontend.layout.master')
@section('mainContent')

<div class="container content" style="padding:0px;" >

    <div class="section-header">
        <div class="breadcump"><a href="{{ route('index') }}"><i class="fa fa-home fa-lg"></i> </a>  / PopUps</div>
        <h2 class="notice_title">
            PopUps
        </h2>
    </div>
</div>


<!-- new content -->
<section>
  <div class="container archiving">
      <div class="col-12 margintop">
           <div class="table-responsive">
               <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th style="width: 5%">SN</th>
                            <th style="width: 45%;">Title</th>
                            <th style="width: 10%;">Image</th>
                            <th style="width:10%;">Published</th>
                            <th style="width: 8%">Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($popups as $popup)    
                        <tr>
                            <td>{{$i++}}</td>
                            <td>
                                <a href="{{ route('popups.single', $popup->slug) }}">
                                    <i class="fas fa-thumbtack thumb-track"></i>
                                    {{$popup->title}}
                                </a>
                            </td>
                            <td>
                                {{$popup->created_at->format('Y-m-d')}}
                            </td>
                            <td align="center">
                                <div class="btn-group">
                                    <a href="{{ route('popups.single', $popup->slug) }}" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a>
                                </div>
                            </td>
                        </tr>
                        @endforeach                                         
                    </tbody>
               </table>
           </div>
      </div>
  </div>
</section>
@endsection