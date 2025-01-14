@extends('backend.layout.master')

@section('mainContent')

<section class="wrapper">
    <div class="row">
        <div class="col-lg-12">
            <!--breadcrumbs start -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}"><i class="fa fa-home"></i> Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="#">Gallery</a></li>
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
                    Gallery
                    <div class="pull-right hidden-phone">
                        <a href="{{ route('galleries.create') }}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Add Gallery</a>
                    </div>
                </header>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>@lang('messages.title')</th>
                                <th>@lang('messages.slug')</th>
                                <th style="width: 30%;">@lang('messages.image')</th>
                                <th>@lang('messages.created_at')</th>
                                <th>@lang('messages.action')</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($galleries as $gallery)
                                <tr>
                                    <th scope="row">1</th>
                                    <td>{{$gallery->title}}</td>
                                    <td>{{$gallery->slug}}</td>
                                    <td>
                                        @if ($gallery->supportingImages)
                                            <img
                                            src="{{$gallery->supportingImages[0]->getUrl()}}"
                                            alt="{{$gallery->title}}"
                                            style="width: 50%; height: 50%;"
                                            >
                                        @endif
                                    </td>
                                    <td>{{$gallery->created_at->diffForHumans()}}</td>
                                    <td>
                                        <a href="{{ route('galleries.edit', $gallery->id) }}" class="btn btn-success btn-sm"><i class=" fa fa-pencil"></i></a>
                                        <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModalCenter{{$gallery->id}}"><i class="fa fa-trash-o "></i></a>
                                    </td>
                                </tr>
{{-- modal --}}
                                <div class="modal fade" id="exampleModalCenter{{$gallery->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header bg-danger">
                                                <h5 class="modal-title" id="exampleModalCenterTitle">@lang('messages.delete_confirmation')</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                @lang('messages.delete_confirmation_question')
                                            </div>
                                            <div class="modal-footer">

                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('messages.cancel')</button>
                                                <form action="{{ route('galleries.destroy', $gallery->id) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger">@lang('messages.delete')</button>
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
