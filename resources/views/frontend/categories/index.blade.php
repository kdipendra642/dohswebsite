@extends('frontend.layout.master')
@section('mainContent')

<div class="container content" style="padding:0px;" >

    <div class="section-header">
        <div class="breadcump"><a href="{{ route('index') }}"><i class="fa fa-home fa-lg"></i> </a>  / Categories</div>
        <h6 class="notice_title">
            Navigations
        </h6>
    </div>
    <div class="row content detail-body">
        <div class="col-lg-9 col-sm-9 col-xs-12">
            <table class="table table-striped table-hover">
                <thead>
                    <th width=10%>SN</th>
                    <th>@lang('messages.title')</th>
                    <th>@lang('messages.slug')</th>
                    <th>go to</th>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($allData['categories'] as $category)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$category->title}}</td>
                        <td>{{$category->slug}}</td>
                        <td>
                            <a href="{{ route('category.post', $category->id)}}"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>
                    @endforeach  
                    <tr>
                        <td>#</td>
                        <td>Photo Gallery</td>
                        <td>-</td>
                        <td>
                            <a href="{{ route('gallery.index')}}"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>#</td>
                        <td>Contact Us</td>
                        <td>-</td>
                        <td>
                            <a href="{{ route('contact')}}"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>#</td>
                        <td>Staffs</td>
                        <td>-</td>
                        <td>
                            <a href="{{ route('index.staffs')}}"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection