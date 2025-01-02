@extends('backend.layout.master')

@section('mainContent')

<section class="wrapper">
    <div class="row">
        <div class="col-lg-12">
            <!--breadcrumbs start -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}"><i class="fa fa-home"></i> Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="#">Posts</a></li>
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
                    Posts
                    <div class="pull-right hidden-phone">
                        <a href="{{ route('posts.create') }}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Add Posts</a>
                    </div>
                </header>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Description</th>
                                <th style="width: 30%;">Document</th>
                                <th>Slug</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                <tr>
                                    <th scope="row">1</th>
                                    <td>{{$post->title}}</td>
                                    <td>{{$post->category->title}}</td>
                                    <td>{!! \Illuminate\Support\Str::limit($post->description, 100, '...') !!}</td>
                                    <td>
                                        @if ($post->getMedia('posts')->isNotEmpty())
                                            @php
                                                $mediaItem = $post->getMedia('posts')->first(); // Get the first media item
                                            @endphp

                                            @if ($mediaItem->mime_type == 'image/png' || $mediaItem->mime_type == 'image/jpeg' || $mediaItem->mime_type == 'image/jpg')
                                                <img
                                                    src="{{ $mediaItem->getUrl() }}"
                                                    alt="{{ $post->title }}"
                                                    style="width: 50%; height: 50%;"
                                                >
                                            @else
                                                <a href="{{ $mediaItem->getUrl() }}" target="_blank">{{ $mediaItem->name }}</a>
                                            @endif
                                        @endif
                                    </td>
                                    <td>{{$post->slug}}</td>
                                    <td>{{$post->created_at->diffForHumans()}}</td>
                                    <td>
                                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-success btn-sm"><i class=" fa fa-pencil"></i></a>
                                        <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModalCenter{{$post->id}}"><i class="fa fa-trash-o "></i></a>
                                    </td>
                                </tr>
{{-- modal --}}
                                <div class="modal fade" id="exampleModalCenter{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header bg-danger">
                                                <h5 class="modal-title" id="exampleModalCenterTitle">Delete Confirmation</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure you want to delete?
                                            </div>
                                            <div class="modal-footer">

                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
{{-- modal ends here --}}
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <!-- page end-->
</section>


@endsection
