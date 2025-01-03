@extends('frontend.layout.master')
@section('mainContent')

<div class="container content" style="padding:0px;" >

    <div class="section-header">
        <div class="breadcump"><a href="{{ route('index') }}"><i class="fa fa-home fa-lg"></i> </a>  / Posts</div>
        <h2 class="notice_title">
            Posts
        </h2>
    </div>


    <div class="row content detail-body">
        <div class="col-lg-9 col-sm-9 col-xs-12">
            <table class="table table-striped table-hover">
                <thead>
                    <th width=10%>SN</th>
                    <th>Title</th>
                    <th>slug</th>
                    <th>go to</th>
                </thead>
                <tbody>
                    @php
                        $i = 0;
                    @endphp
                    @foreach ($posts as $post)
                    <tr>
                        <td>1.</td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->slug}}</td>
                        <td>
                            <a href="{{ route('posts.single', $post->slug) }}"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>
                    @endforeach         
                </tbody>
            </table>
        </div>

    </div>
</div>


@endsection