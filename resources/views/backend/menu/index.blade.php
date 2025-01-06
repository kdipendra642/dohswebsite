@extends('backend.layout.master')

@section('mainContent')

<section class="wrapper">
    <div class="row">
        <div class="col-lg-12">
            <!--breadcrumbs start -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}"><i class="fa fa-home"></i> Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="#">Menu</a></li>
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
                    Menu
                </header>
        <a href="javascript:;"  class="btn btn-default text-center text-danger bg-warning" id="pulsate-regular">Please be careful while changing this section as it might affect the site.</a>


                <div class="card-body">
                    {!! Menu::render() !!}
                </div>
            </section>
        </div>
    </div>
    <!-- page end-->
</section>

@endsection

@push('scripts')
    {!! Menu::scripts() !!}
@endpush
