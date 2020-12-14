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
                            <h6 class="text-muted">Cooks</h6>
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
            {{-- <div class="col-xl-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="dash-widget-header">
                            <span class="dash-widget-icon text-warning border-warning">
                                <i class="fe fe-folder"></i>
                            </span>
                            <div class="dash-count">
                                <h3>$62523</h3>
                            </div>
                        </div>
                        <div class="dash-widget-info">

                            <h6 class="text-muted">Revenue</h6>
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-warning w-50"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
        {{-- <div class="row">
            <div class="col-md-12 col-lg-6">

                <!-- Sales Chart -->
                <div class="card card-chart">
                    <div class="card-header">
                        <h4 class="card-title">Revenue</h4>
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
        <div class="row">
            @if (auth()->guard('admin')->user()->roles[0]->name != 'cook')
            <div class="col-md-6 d-flex">

                <!-- Recent Orders -->
                <div class="card card-table flex-fill">
                    <div class="card-header">
                        <h4 class="card-title">Cooks List</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-center mb-0">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        {{-- <th>Reviews</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @isset($cooks)
                                        @foreach ($cooks as $cook)
                                        <tr>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset('backend/img/cook/'.$cook->images )}}" alt="User Image"></a>
                                                    <a href="profile.html">{{ $cook->name }}</a>
                                                </h2>
                                            </td>
                                            <td>{{ $cook->email }}</td>
                                            <td>{{  $cook->phone  }}</td>
                                            {{-- <td>
                                                <i class="fe fe-star-o text-secondary"></i>
                                                <i class="fe fe-star-o text-secondary"></i>
                                                <i class="fe fe-star-o text-secondary"></i>
                                                <i class="fe fe-star-o text-secondary"></i>
                                                <i class="fe fe-star-o text-secondary"></i>
                                            </td> --}}

                                        </tr>
                                        @endforeach
                                    @endisset

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /Recent Orders -->

            </div>
            @endif
            <div class="col-md-6 d-flex">

                <!-- Feed Activity -->
                <div class="card  card-table flex-fill">
                    <div class="card-header">
                        <h4 class="card-title">Customer List</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-center mb-0">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>Phone</th>
                                        {{-- <th>Action</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                   @isset($customers)
                                   @foreach ($customers as $customer)
                                   <tr>
                                        <td>
                                            <h2 class="table-avatar">
                                                {{-- <a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="" alt="Customer Image"></a> --}}
                                                <a href="profile.html">{{ $customer->name }}</a>
                                            </h2>
                                        </td>
                                        <td>{{ $customer->email }}</td>
                                        <td>{{ $customer->address ?? '' }}</td>
                                        <td>{{ $customer->phone }}</td>
                                        {{-- <td >
                                            <div class="actions">
                                                <a class="link_delete" data-toggle="modal" href="#delete_modal" data-url=""  class="btn btn-sm btn-danger" style="color: #f00">
                                                    <i class="fe fe-trash"></i> Delete
                                                </a>
                                            </div>
                                        </td> --}}
                                    </tr>
                                   @endforeach

                                   @endisset

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /Feed Activity -->

            </div>
        </div>
        <div class="row">
            <div class="col-md-12">

                <!-- Recent Orders -->
                <div class="card card-table">
                    <div class="card-header">
                        <h4 class="card-title">Order List</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-center mb-0">
                                <thead>
                                    <tr>
                                        <th>Order Number</th>
                                        <th>Customer Name</th>
                                        <th>Dish Name</th>
                                        <th>Dish Section</th>
                                        <th>Dish price</th>
                                        <th>Dish Qty</th>
                                        <th>Order Price</th>
                                        <th>Order Notes</th>
                                        {{-- <th>Action</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                   @isset($orders)
                                    @foreach ($orders as $index=>$order)

                                    <tr>
                                        <td>{{ $index+1 }}</td>
                                        <td>
                                            <h2 class="table-avatar">
                                                {{-- <a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="" alt="User Image"></a> --}}
                                                <a href="#">{{ $order->users->name }}</a>
                                            </h2>
                                        </td>
                                        @php

                                            $orderEntry=json_decode($order->orderEntry,true);

                                        @endphp
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="#" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{ asset('backend/img/dishes/'.explode('__',$orderEntry['images'] )[0]) }}" ></a>
                                                <a href="#">{{ $orderEntry['name'] }}</a>
                                            </h2>

                                        </td>
                                        <td>{{ $orderEntry['section'] }}</td>
                                        <td>{{ $orderEntry['price'] }}</td>
                                        <td>{{ $orderEntry['qty'] }}</td>
                                        <td>{{ $orderEntry['price'] * $orderEntry['qty']}}</td>
                                        <td>{{ $orderEntry['notes'] }}</td>
                                        {{-- <td >
                                            <div class="actions">
                                                <a class="link_delete" data-toggle="modal" href="#delete_modal" data-url=""  class="btn btn-sm btn-danger" style="color: #f00">
                                                    <i class="fe fe-trash"></i> Delete
                                                </a>
                                            </div>
                                        </td> --}}
                                    </tr>
                                    @endforeach
                                   @endisset

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /Recent Orders -->

            </div>
        </div>

    </div>
</div>
<!-- /Page Wrapper -->


@endsection
