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
                <table class="table table-responsive table-striped" id="contact">
                    <thead class="thead-light">
                    <tr>
                        <th style="width:5%">क्र.सं.</th>
                        <th>पद</th>
                        <th>प्रोफाइल</th>
                        <th width=15%>पदाधिकारीको नाम</th>
                        <th>शाखा</th>
                        <th>डिभिजन</th>
                        <th>मोबाईल नम्बर</th>
                        <th>ईमेल</th>
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
                            <td>{{$staff->position}}</td>
                            <td>
                                @if ($staff->getMedia('staffs')->isNotEmpty())
                                    <img
                                    src="{{$staff->getMedia('staffs')[0]->getUrl()}}"
                                    alt="{{$staff->name}}"
                                    style="width: 150px;"
                                    >
                                @endif
                            </td>
                            <td>{{$staff->name}}</td>
                            <td>{{$staff->section}}</td>
                            <td>{{$staff->division}}</td>
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
{{--
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready( function () {
            $('#contact').DataTable({
                "pageLength": 25,
                responsive: true
            });
        } );
    </script> --}}

@endsection
