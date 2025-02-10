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

<!-- New Content -->
<section>
    <div class="container archiving">
        <div class="col-12 margintop">
            <div class="mb-3 row">
                <div class="col-md-4">
                    <!-- Search Input -->
                    <label for="searchInput" class="form-label">Search</label>
                    <input type="text" id="searchInput" placeholder="Search By Keywords..." class="form-control">
                </div>
                <div class="col-md-3">
                    <!-- Start Date Picker -->
                    <label for="startDate" class="form-label">From</label>
                    <input type="date" id="startDate" class="form-control" placeholder="Start Date">
                </div>
                <div class="col-md-3">
                    <!-- End Date Picker -->
                    <label for="endDate" class="form-label">To</label>
                    <input type="date" id="endDate" class="form-control" placeholder="End Date">
                </div>
                <div class="col-md-2 align-self-end">
                    <!-- Clear Search Button -->
                    <button id="clearSearchButton" class="btn btn-secondary w-100">Clear Search</button>
                </div>
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
                            <td class="post-date">
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

<!-- JavaScript for Search and Date Filter -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const searchInput = document.getElementById('searchInput');
        const startDate = document.getElementById('startDate');
        const endDate = document.getElementById('endDate');
        const clearSearchButton = document.getElementById('clearSearchButton');
        const tableRows = document.querySelectorAll('.table tbody tr');

        // Function to filter rows based on search text and date range
        function filterTable() {
            const searchText = searchInput.value.toLowerCase();
            const startDateValue = startDate.value;
            const endDateValue = endDate.value;

            tableRows.forEach(row => {
                const rowText = row.textContent.toLowerCase();
                const rowDate = row.querySelector('.post-date').textContent.trim();

                const matchesSearch = rowText.includes(searchText);
                const matchesDateRange = (
                    (!startDateValue || rowDate >= startDateValue) &&
                    (!endDateValue || rowDate <= endDateValue)
                );

                if (matchesSearch && matchesDateRange) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }

        // Function to clear all filters
        function clearFilters() {
            searchInput.value = '';
            startDate.value = '';
            endDate.value = '';
            filterTable(); // Reapply filtering to show all rows
        }

        // Add event listeners for search, date inputs, and clear search button
        searchInput.addEventListener('keyup', filterTable);
        startDate.addEventListener('change', filterTable);
        endDate.addEventListener('change', filterTable);
        clearSearchButton.addEventListener('click', clearFilters);
    });
</script>

@endsection