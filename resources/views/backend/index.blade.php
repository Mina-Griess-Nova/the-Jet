@extends('backend.layouts.app')

@push('style')
    <style>
.sub tr th,.sub tr td{
    border: 0 !important
}
.scroll{

    max-height: 400px;
    overflow: scroll;
}

</style>
@endpush
@section('content')



<!-- Page Wrapper -->
<div class="page-wrapper">

    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Welcome Admin!</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <div class="row">
            @if (auth()->guard('admin')->user()->roles[0]->name != 'cook')
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="dash-widget-header">
                            <span class="dash-widget-icon text-primary border-primary">
                                <i class="fe fe-users"></i>
                            </span>
                            <div class="dash-count">
                                <h3>{{ count($cooks) }}</h3>
                            </div>
                        </div>
                        <div class="dash-widget-info">
                            <h6 class="text-muted">Vendors</h6>
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-primary" style="width: {{ count($cooks) }}%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-body">
                        @isset($customers)
                        <div class="dash-widget-header">
                            <span class="dash-widget-icon text-success">
                                <i class="fe fe-credit-card"></i>
                            </span>
                            <div class="dash-count">

                                    <h3>{{ count($customers) }}</h3>
                            </div>
                        </div>
                        <div class="dash-widget-info">

                            <h6 class="text-muted">Customers</h6>
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-success" style="width: {{ count($customers) }}%"></div>
                            </div>
                        </div>
                        @endisset
                    </div>
                </div>
            </div>
           @isset($orders)
           <div class="col-xl-3 col-sm-6 col-12">
            <div class="card">
                <div class="card-body" >
                    <div class="dash-widget-header">
                        <span class="dash-widget-icon text-danger border-danger">
                            <i class="fe fe-money"></i>
                        </span>
                        <div class="dash-count">
                            <h3>{{ count($orders) }}</h3>
                        </div>
                    </div>
                    <div class="dash-widget-info">

                        <h6 class="text-muted">Orders</h6>
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-danger" style="width: {{ count($orders) }}%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card">
                <div class="card-body">
                        <div class="dash-widget-header">
                            <span class="dash-widget-icon text-red border-red">
                                <i class="fe fe-folder"></i>
                            </span>
                            <div class="dash-count">
                                <h3>{{ $total_revenue ?? ' ' }} EGP</h3>
                            </div>
                        </div>
                        <div class="dash-widget-black">

                            <h6 class="text-muted">revenue</h6>
                            <div class="progress progress-sm">
                                <div class="progress-bar" style="width:{{ $total_revenue / 100  ?? ' '}}% ;background-color:black"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endisset

       <div class="col-xl-3 col-sm-6 col-12">
        <div class="card">
            <div class="card-body">
                    <div class="dash-widget-header">
                        <span class="dash-widget-icon text-warning border-warning">
                            <i class="fe fe-folder"></i>
                        </span>
                        <div class="dash-count">
                            <h3>{{ $total_profit ?? ' ' }} EGP</h3>
                        </div>
                    </div>
                    <div class="dash-widget-info">

                        <h6 class="text-muted">profit</h6>
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-warning" style="width:{{ $total_profit / 100  ?? ' '}}% "></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        {{-- <div class="row">
            <div class="col-md-12 col-lg-6">

                <!-- Sales Chart -->
                <div class="card card-chart">
                    <div class="card-header">
                        <h4 class="card-title">profit</h4>
                    </div>
                    <div class="card-body">
                        <div id="morrisArea"></div>
                    </div>
                </div>
                <!-- /Sales Chart -->

            </div>
            <div class="col-md-12 col-lg-6">

                <!-- Invoice Chart -->
                <div class="card card-chart">
                    <div class="card-header">
                        <h4 class="card-title">Status</h4>
                    </div>
                    <div class="card-body">
                        <div id="morrisLine"></div>
                    </div>
                </div>
                <!-- /Invoice Chart -->

            </div>
        </div> --}}
       

    </div>
</div>
<!-- /Page Wrapper -->


@endsection
