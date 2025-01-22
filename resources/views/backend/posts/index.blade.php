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
                    <div class="row">
                        <div class="col-md-12">
                            <label>Filter Data</label>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <select class="form-control" id="category-filter">
                                    <option value="">All Categories</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- <div class="col-md-2">
                            <div class="form-group">
                                <select class="form-control" id="subcategory-filter">
                                    <option value="">Sub Categories</option>
                                    <option value="laws-regulation">कानून / नियमावली</option>
                                    <option value="information-news">सूचना</option>
                                    <option value="tender-notice">बोलपत्र सम्बन्धी सूचना</option>
                                    <option value="press-release">प्रेस विज्ञप्ति</option>
                                    <option value="publication">प्रकाशन</option>
                                    <option value="other">अन्य</option>
                                </select>
                            </div>
                        </div> -->
                    </div>
              
                    <div class="table-responsive">
                        <table class="table table-bordered" id="posts-table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>@lang('messages.title')</th>
                                <th>Category</th>
                                <th>Sub Category</th>
                                <th>Description</th>
                                <th style="width: 30%;">Document</th>
                                <th>@lang('messages.slug')</th>
                                <th>@lang('messages.created_at')</th>
                                <th>@lang('messages.action')</th>
                            </tr>
                            </thead>

                            @foreach($posts as $post)
                            <div class="modal fade" id="exampleModalCenter{{ $post->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">@lang('messages.delete')</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
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
            var table = $('#posts-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('posts.data') }}",
                    type: "GET",
                    data: function(d) {
                        d.category_id = $('#category-filter').val();
                        // d.sub_category = $('#subcategory-filter').val();
                    },
                    error: function(xhr, error, thrown) {
                        console.error('Error:', xhr.status, thrown);
                    }
                },
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'title', name: 'title' },
                    { data: 'category', name: 'category.title' },
                    { data: 'sub_category', name: 'sub_category' },
                    { data: 'description', name: 'description' },
                    {
                        data: 'document_url',
                        name: 'document_url',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row) {
                            if (data) {
                                if (data.type == 'application/pdf') {
                                    return ' <a href="'+ data.media +'" target="_blank">'+ data.media +'</a>';
                                } else {
                                    return '<img src="' + data.media + '" alt="' + row.title + '" style="width: 50%; height: 50%;">';
                                }
                            }
                            return '';
                        }
                    },
                    { data: 'slug', name: 'slug' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ]
            });

            // Reload the DataTable when the category filter changes
            $('#category-filter').on('change', function() {
                table.ajax.reload(); // Reload the DataTable
            });
            // $('#subcategory-filter').on('change', function() {
            //     table.ajax.reload(); // Reload the DataTable
            // });

            
        });
    </script>
@endsection
