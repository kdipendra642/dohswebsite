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
                <!-- Search Input -->
                <input type="text" id="searchInput" placeholder="Search..." class="form-control">
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
                                    {{  Illuminate\Support\Str::limit(session('locale') === 'en' ? $post->title : ($post->title_nep ?? $post->title), 125) }}
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

<!-- JavaScript for Search -->
<script>
    $(document).ready(function () {
        $('#searchInput').on('keyup', function () {
            const searchText = $(this).val().toLowerCase();

            $('.table tbody tr').each(function () {
                const rowText = $(this).text().toLowerCase();

                if (rowText.includes(searchText)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });
    });
</script>

@endsection