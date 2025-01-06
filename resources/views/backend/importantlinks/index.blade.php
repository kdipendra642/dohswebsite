@extends('backend.layout.master')

@section('mainContent')

@include('backend.datatable.upperscript')

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
                        <table class="table table-bordered" id="importantlinks-table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>@lang('messages.title')</th>
                                <th>URL</th>
                                <th>Display At Home Page</th>
                                <th>@lang('messages.created_at')</th>
                                <th>@lang('messages.action')</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($importantlinks as $importantlink)
                                {{-- modal --}}
                                <div class="modal fade" id="exampleModalCenter{{$importantlink->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                                <form action="{{ route('importantlinks.destroy', $importantlink->id) }}" method="POST">
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

@include('backend.datatable.lowerscript')

<script>
jQuery(document).ready(function($) {
    $('#importantlinks-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{ route('importantlinks.data') }}",
            type: "GET",
            error: function(xhr, error, thrown) {
                console.error('Error:', xhr.status, thrown);
            }
        },
        columns: [
            { data: 'id', name: 'id' },
            { data: 'title', name: 'title' },
            { data: 'url', name: 'url' },
            { data: 'showOnHomePage', name: 'showOnHomePage' },
            { data: 'created_at', name: 'created_at' },
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ]
    });
});
</script>
@endsection
