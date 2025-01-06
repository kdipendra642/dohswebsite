@extends('backend.layout.master')

@section('mainContent')

<section class="wrapper">
    <!--state overview start-->
    <div class="row state-overview">
        <div class="col-lg-8">
            <!--latest product info start-->
            <div class="card-body bg-white border border-danger" style="padding: 10px; height: 85%; border-radius: 5px;">
                <h5>@lang('messages.welcome_message', ['name' => auth()->user()->name])</h5>
            </div>
            <!--latest product info end-->
        </div>
        <div class="col-lg-3 col-sm-6">
            <section class="card">
                <a href="{{ route('categories.index') }}">
                    <div class="symbol terques">
                        <i class="fa fa-level-up"></i>
                    </div>
                    <div class="value">
                        <h1 class="count">{{count($dashboardData['categories'])}}</h1>
                        <p>@lang('messages.category')</p>
                    </div>
                </a>
            </section>
        </div>
        <div class="col-lg-3 col-sm-6">
            <section class="card">
                <a href="{{ route('staffs.index') }}">
                    <div class="symbol red">
                        <i class="fa  fa-users"></i>
                    </div>
                    <div class="value">
                        <h1 class=" count2">{{count($dashboardData['staffs'])}}</h1>
                        <p>@lang('messages.staffs')</p>
                    </div>
                </a>
            </section>
        </div>
        <!-- <div class="col-lg-3 col-sm-6">
            <section class="card">
                <div class="symbol yellow">
                    <i class="fa fa-shopping-cart"></i>
                </div>
                <div class="value">
                    <h1 class=" count3">328</h1>
                    <p>New Order</p>
                </div>
            </section>
        </div> -->
        <!-- <div class="col-lg-3 col-sm-6">
            <section class="card">
                <div class="symbol blue">
                    <i class="fa fa-bar-chart-o"></i>
                </div>
                <div class="value">
                    <h1 class=" count4">10328</h1>
                    <p>Total Profit</p>
                </div>
            </section>
        </div> -->
    </div>
    <!--state overview end-->
</section>

@endsection
