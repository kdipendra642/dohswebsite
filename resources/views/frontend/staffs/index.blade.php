@extends('frontend.layout.master')
@section('mainContent')

<section id="clients" class="wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
    <div class="container nopad">
        <div class="section-header" style="padding-bottom:12px;">
            <div class="breadcump">
                <a href="{{ route('index') }}"><i class="fa fa-home fa-lg"></i> </a>  / Staffs
            </div>
        </div>
        <div class="row" style="margin-bottom:50px;">
            <div class="col-lg-12 col-sm-12 col-xs-12">
                <div class="mb-3">
                    <!-- Search Input -->
                    <input type="text" id="searchInput" placeholder="Search..." class="form-control">
                </div>
                <table class="table table-responsive table-striped" id="contact">
                    <thead class="thead-light">
                    <tr>
                        <th style="width:5%">@lang('messages.sn')</th>
                        <th>@lang('messages.position')</th>
                        <th>@lang('messages.profile')</th>
                        <th width=15%>@lang('messages.name')</th>
                        <th>@lang('messages.section')</th>
                        <th>@lang('messages.section')</th>
                        <th>@lang('messages.contact_number')</th>
                        <th>@lang('messages.email')</th>
                        <th>#</th>
                    </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($staffs as $staff)
                        <tr>
                            <td>{{$i++;}}</td>
                            <td>
                            {{ Illuminate\Support\Str::limit(session('locale') === 'en' ? $staff->position : ($staff->position_nep ?? $staff->position), 50) }}
                            </td>
                            <td>
                                @if ($staff->getMedia('staffs')->isNotEmpty())
                                    <img
                                    src="{{$staff->getMedia('staffs')[0]->getUrl()}}"
                                    alt="{{$staff->name}}"
                                    style="width: 100px; height: auto;"
                                    >
                                @endif
                            </td>
                            <td>{{$staff->name}}</td>
                            <td>
                                {{ Illuminate\Support\Str::limit(session('locale') === 'en' ? $staff->section : ($staff->section_nep ?? $staff->section), 50) }}  
                            </td>
                            <td>
                                {{ Illuminate\Support\Str::limit(session('locale') === 'en' ? $staff->division : ($staff->division_nep ?? $staff->division), 50) }}  
                            </td>
                            <td>{{$staff->telephone}}</td>
                            <td>{{$staff->email}}</td>
                            <td>
                                <a href="{{ route('single.staffs', $staff->id) }}" alt="view full detail"><i class="fa fa-eye"></i> View</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
  </section>


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
