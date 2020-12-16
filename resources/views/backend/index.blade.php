@extends('backend.layouts.app')




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
            <h5 class="col-xl-12 col-sm-12 col-12">Daily</h5>

            @if (auth()->guard('admin')->user()->roles[0]->name != 'cook')
            <div class="col-xl-2 col-sm-6 col-12">

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
            <div class="col-xl-2 col-sm-6 col-12">
                <div class="card">
                    <div class="card-body">
                        @isset($customers)
                        <div class="dash-widget-header">
                            <span class="dash-widget-icon text-success">
                                <i class="fe fe-users"></i>
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
           <div class="col-xl-2 col-sm-6 col-12">
                <div class="card">
                    <div class="card-body">
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
           @endisset
            <div class="col-xl-2 col-sm-6 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="dash-widget-header">
                            <span class="dash-widget-icon text-warning border-warning">
                                <i class="fe fe-folder"></i>
                            </span>
                            <div class="dash-count">
                                <h3>EGP 0</h3>
                            </div>
                        </div>
                        <div class="dash-widget-info">

                            <h6 class="text-muted">Revenue</h6>
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-warning "style="width: 0%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-sm-6 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="dash-widget-header">
                            <span class="dash-widget-icon text-danger border-danger">
                                <i class="fe fe-money"></i>
                            </span>
                            <div class="dash-count">
                                <h3>{{ count($orders) }}</h3>
                            </div>
                        </div>
                        <div class="dash-widget-info">
                            <h6 class="text-muted">Commission</h6>
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-danger" style="width: {{ count($orders) }}%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
     <br>
     <div class="row">
        <h5 class="col-xl-12 col-sm-12 col-12">Monthly</h5>

        @if (auth()->guard('admin')->user()->roles[0]->name != 'cook')
        <div class="col-xl-2 col-sm-6 col-12">

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
        <div class="col-xl-2 col-sm-6 col-12">
            <div class="card">
                <div class="card-body">
                    @isset($customers)
                    <div class="dash-widget-header">
                        <span class="dash-widget-icon text-success">
                            <i class="fe fe-users"></i>
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
       <div class="col-xl-2 col-sm-6 col-12">
            <div class="card">
                <div class="card-body">
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
       @endisset
        <div class="col-xl-2 col-sm-6 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="dash-widget-header">
                        <span class="dash-widget-icon text-warning border-warning">
                            <i class="fe fe-folder"></i>
                        </span>
                        <div class="dash-count">
                            <h3>EGP 0</h3>
                        </div>
                    </div>
                    <div class="dash-widget-info">

                        <h6 class="text-muted">Revenue</h6>
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-warning "style="width: 0%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-2 col-sm-6 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="dash-widget-header">
                        <span class="dash-widget-icon text-danger border-danger">
                            <i class="fe fe-money"></i>
                        </span>
                        <div class="dash-count">
                            <h3>{{ count($orders) }}</h3>
                        </div>
                    </div>
                    <div class="dash-widget-info">
                        <h6 class="text-muted">Commission</h6>
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-danger" style="width: {{ count($orders) }}%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>
    <div class="row">
        <h5 class="col-xl-12 col-sm-12 col-12">Lifetime</h5>

        @if (auth()->guard('admin')->user()->roles[0]->name != 'cook')
        <div class="col-xl-2 col-sm-6 col-12">

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
        <div class="col-xl-2 col-sm-6 col-12">
            <div class="card">
                <div class="card-body">
                    @isset($customers)
                    <div class="dash-widget-header">
                        <span class="dash-widget-icon text-success">
                            <i class="fe fe-users"></i>
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
       <div class="col-xl-2 col-sm-6 col-12">
            <div class="card">
                <div class="card-body">
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
       @endisset
        <div class="col-xl-2 col-sm-6 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="dash-widget-header">
                        <span class="dash-widget-icon text-warning border-warning">
                            <i class="fe fe-folder"></i>
                        </span>
                        <div class="dash-count">
                            <h3>EGP 0</h3>
                        </div>
                    </div>
                    <div class="dash-widget-info">

                        <h6 class="text-muted">Revenue</h6>
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-warning "style="width: 0%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-2 col-sm-6 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="dash-widget-header">
                        <span class="dash-widget-icon text-danger border-danger">
                            <i class="fe fe-money"></i>
                        </span>
                        <div class="dash-count">
                            <h3>{{ count($orders) }}</h3>
                        </div>
                    </div>
                    <div class="dash-widget-info">
                        <h6 class="text-muted">Commission</h6>
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-danger" style="width: {{ count($orders) }}%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
</div>
<!-- /Page Wrapper -->



@endsection
