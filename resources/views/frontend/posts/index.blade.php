@extends('frontend.layout.master')
@section('mainContent')

<div class="container content" style="padding:0px;" >

    <div class="section-header">
        <div class="breadcump"><a href="{{ route('index') }}"><i class="fa fa-home fa-lg"></i> </a>  / @lang('messages.posts')</div>
        <h2 class="notice_title">
            @lang('messages.posts')
        </h2>
    </div>
</div>


<!-- new content -->

<section>
  <div class="container archiving">
      <div class="col-12 margintop">
        <div class="mb-3">
               <form method="GET" action="{{ route('posts.index') }}" class="form-inline">
                    <div class="form-group mr-2">
                       <label for="title" class="mr-2">@lang('messages.title'):</label>
                       <input type="text" name="title" id="title" class="form-control">
                   </div>
                   <div class="form-group mr-2">
                       <label for="category" class="mr-2">@lang('messages.category'):</label>
                       <select name="category" id="category" class="form-control">
                            <option value="" selected>--- Please Select ---</option>
                       </select>
                   </div>
                   <div class="form-group mr-2">
                       <label for="date" class="mr-2">@lang('messages.published_at'):</label>
                       <input type="date" name="date" id="date" class="form-control">
                   </div>
                   <button type="submit" class="btn btn-primary">@lang('messages.submit')</button>
               </form>
           </div>
           <div class="table-responsive">
               <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th style="width: 5%">@lang('messages.sn')</th>
                            <th style="width: 45%;">@lang('messages.title')</th>
                            <th style="width: 10%;">@lang('messages.category')</th>
                            <th style="width:10%;">@lang('messages.published_at')</th>
                            <th style="width: 8%">@lang('messages.details')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($posts as $post)    
                        <tr>
                            <td>{{$i++}}</td>
                            <td>
                                <a href="{{ route('posts.single', $post->slug) }}">
                                    <i class="fas fa-thumbtack thumb-track"></i>
                                    {{$post->title}}
                                </a>
                            </td>
                            <td>
                                <span class="badge badge-danger">{{$post->category->title}}</span>
                            </td>
                            <td>
                                {{$post->created_at->format('Y-m-d')}}
                            </td>
                            <td align="center">
                                <div class="btn-group">
                                    <a href="{{ route('posts.single', $post->slug) }}" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a>
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