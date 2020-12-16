@extends('backend.layouts.app')

@push('style')
    <style>
        .avatar-sm {
         width: 4.5rem !important;
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
                    <h3 class="page-title">List of orders</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">order</li>
                    </ul>
                </div>
               {{-- @if (!Auth::guard('order')) --}}
                {{-- <div class="col-sm-12 col">
                    {{-- <a href="#Add_orders" data-toggle="modal" class="btn btn-otbokhly float-right mt-2 {{ auth()->guard('order') ? 'disabled' : '' }}" >Add</a> --}}
                    {{-- <a href="#Add_orders" data-toggle="modal" class="btn btn-otbokhly float-right mt-2   " >Add</a>
                </div>  --}}
               {{-- @endif --}}
            </div>

        </div>
        <!-- /Page Header -->

        <div class="row">
            <div class="col-xl-2 col-sm-6 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="dash-widget-header">
                            <span class="dash-widget-icon text-primary border-primary">
                            </span>
                            <div class="dash-count">
                                <h3>0</h3>
                            </div>
                        </div>
                        <div class="dash-widget-info">
                            <h6 class="text-muted">pending</h6>
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-primary" style="width: 0%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-sm-6 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="dash-widget-header">
                            <span class="dash-widget-icon text-primary border-primary">
                            </span>
                            <div class="dash-count">
                                <h3>0</h3>
                            </div>
                        </div>
                        <div class="dash-widget-info">
                            <h6 class="text-muted">late</h6>
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-primary" style="width: 0%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-sm-6 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="dash-widget-header">
                            <span class="dash-widget-icon text-primary border-primary">
                            </span>
                            <div class="dash-count">
                                <h3>0</h3>
                            </div>
                        </div>
                        <div class="dash-widget-info">
                            <h6 class="text-muted">on duty drivers</h6>
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-primary" style="width: 0%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-sm-6 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="dash-widget-header">
                            <span class="dash-widget-icon text-primary border-primary">
                            </span>
                            <div class="dash-count">
                                <h3>0</h3>
                            </div>
                        </div>
                        <div class="dash-widget-info">
                            <h6 class="text-muted">available drivers</h6>
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-primary" style="width: 0%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             
        </div>

        <div class="row" >

            <div class="col-md-12 d-flex">

                <!-- Recent Orders -->
                <div class="card card-table flex-fill">
                    <div class="card-header">
                        <h4 class="card-title">orders List</h4>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-center mb-0">
                                <thead>
                                    <tr>
                                        <th>Order Number</th>
                                        <th>Order Time</th>
                                        <th>Customer Name</th>
                                        <th>Restaurant Name</th>
                                        <th>Dish Section</th>
                                        <th>Dish price</th>
                                        <th>Amount</th>
                                        <th>Location</th>
                                        <th>Delivery Type</th>
                                        <th>Amount</th>
                                        <th>Payment Method</th>
                                        <th>Delivery Status</th>
                                        <th>Order Status</th>
                                        <th>Order Status</th>
                                        <th>Customer service</th>
                                        <th>Operations service</th>
                                        <th>Action</th>
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
                                        <td >
                                            <div class="actions">
                                                <a class="link_delete" data-toggle="modal" href="#delete_modal" data-url=""  class="btn btn-sm btn-danger" style="color: #f00">
                                                    <i class="fe fe-trash"></i> Delete
                                                </a>
                                            </div>
                                        </td>
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
  <!-- Add Modal -->
  <div class="modal fade" id="Add_orders" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add order</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @include('backend.partials.errors')

                <form method="POST" action="{{ url('dashboard/order') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row form-row">
                        <div class="col-12 col-sm-12">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                            </div>
                        </div>
                        <div class="col-12 col-sm-12">
                            <div class="form-group">
                                <label>phone</label>
                                <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
                            </div>
                        </div>
                        <div class="col-12 col-sm-12">
                            <div class="form-group">
                                <label>E-mail</label>
                                <input type="text" name="email" class="form-control" value="{{ old('email') }}">
                            </div>
                        </div>
                        <div class="col-12 col-sm-12">
                            <div class="form-group">
                                <label>password</label>
                                <input type="password" name="password" class="form-control" >
                            </div>
                        </div>

                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                                aria-selected="true">Home</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
                                aria-selected="false">Profile</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact"
                                aria-selected="false">Contact</a>
                            </li>
                          </ul>
                          <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">Raw denim you
                             </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">Food truck fixie
                             </div>
                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">Etsy mixtape
                              </div>
                          </div>
                    </div>
                    <button type="submit" class="btn btn-otbokhly btn-block">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /ADD Modal -->

      <!-- Delete Modal -->

      <div class="modal fade" id="delete_modal" aria-hidden="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document" >
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-content p-2">
                        <h4 class="modal-title">Delete</h4>
                        <p class="mb-4">Are you sure want to delete?</p>

                        <form  id="formDelete" action="" method="POST" style="display: inline">
                            @csrf
                            @method('delete')
                            <button class="btn btn-primary btn-delete" type="submit" class="btn btn-primary">Delete </button>
                        </form>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Delete Modal -->


@endsection


@push('scripts')
    <script>
        @if (count($errors) > 0)
                $('#Add_orders').modal('show');
        @endif
    </script>
@endpush
