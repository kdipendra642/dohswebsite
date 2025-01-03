@extends('backend.layout.master')

@section('mainContent')

<section class="wrapper">
    <div class="row">
        <div class="col-lg-12">
            <!--breadcrumbs start -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}"><i class="fa fa-home"></i> Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="#">Important Links</a></li>
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
                    Important Links
                    <div class="pull-right hidden-phone">
                        <a href="{{ route('importantlinks.create') }}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Add Links</a>
                    </div>
                </header>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>URL</th>
                                <th>Display At Home Page</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($importantlinks as $importantlink)
                                <tr>
                                    <th scope="row">1</th>
                                    <td>{{$importantlink->title}}</td>
                                    <td>{{$importantlink->url}}</td>
                                    <td>{{$importantlink->showOnHomePage ? 'Yes' : 'No'}}</td>
                                    <td>{{$importantlink->created_at->diffForHumans()}}</td>
                                    <td>
                                        <a href="{{ route('importantlinks.edit', $importantlink->id) }}" class="btn btn-success btn-sm"><i class=" fa fa-pencil"></i></a>
                                        <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModalCenter{{$importantlink->id}}"><i class="fa fa-trash-o "></i></a>
                                    </td>
                                </tr>
{{-- modal --}}
                                <div class="modal fade" id="exampleModalCenter{{$importantlink->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                                <form action="{{ route('importantlinks.destroy', $importantlink->id) }}" method="POST">
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
