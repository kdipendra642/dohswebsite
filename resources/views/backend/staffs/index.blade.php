@extends('backend.layout.master')

@section('mainContent')

<section class="wrapper">
    <div class="row">
        <div class="col-lg-12">
            <!--breadcrumbs start -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}"><i class="fa fa-home"></i> Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="#">Staffs</a></li>
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
                    Staffs
                    <div class="pull-right hidden-phone">
                        <a href="{{ route('staffs.create') }}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Add Staffs</a>
                    </div>
                </header>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th style="width: 15%;">@lang('messages.image')</th>
                                <th>@lang('messages.name')</th>
                                <th>Telephone</th>
                                <th>@lang('messages.email')</th>
                                <th>@lang('messages.position')</th>
                                <th>@lang('messages.division')</th>
                                <th>@lang('messages.section')</th>
                                <th>Features</th>
                                <th>@lang('messages.created_at')</th>
                                <th>@lang('messages.action')</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($staffs as $staff)
                                <tr>
                                    <th scope="row">1</th>
                                    <td>
                                        @if ($staff->getMedia('staffs')->isNotEmpty())
                                            <img
                                            src="{{$staff->getMedia('staffs')[0]->getUrl()}}"
                                            alt="{{$staff->name}}"
                                            style="width: 30%; height: 30%;"
                                            >
                                        @endif
                                    </td>
                                    <td>{{$staff->name}}</td>
                                    <td>{{$staff->telephone}}</td>
                                    <td>{{$staff->email}}</td>
                                    <td>{{$staff->position}}</td>
                                    <td>{{$staff->division}}</td>
                                    <td>{{$staff->section}}</td>
                                    <td>
                                        @if ($staff->showOnHomePage)
                                            Show On Home Page
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>{{$staff->created_at->diffForHumans()}}</td>
                                    <td>
                                        <a href="{{ route('staffs.edit', $staff->id) }}" class="btn btn-success btn-sm"><i class=" fa fa-pencil"></i></a>
                                        <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModalCenter{{$staff->id}}"><i class="fa fa-trash-o "></i></a>
                                    </td>
                                </tr>
{{-- modal --}}
                                <div class="modal fade" id="exampleModalCenter{{$staff->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                                <form action="{{ route('staffs.destroy', $staff->id) }}" method="POST">
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
