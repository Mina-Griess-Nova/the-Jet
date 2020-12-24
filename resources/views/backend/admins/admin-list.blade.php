@extends('backend.layouts.app')


@section('content')
 <!-- Page Wrapper -->
 <div class="page-wrapper">
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">List of admins</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">admin</li>
                    </ul>
                </div>
               {{-- @if (!Auth::guard('admin')) --}}
                <div class="col-sm-12 col">
                    {{-- <a href="#Add_admins" data-toggle="modal" class="btn btn-otbokhly float-right mt-2 {{ auth()->guard('admin') ? 'disabled' : '' }}" >Add</a> --}}
                    <a href="#Add_admins" data-toggle="modal" class="btn btn-otbokhly float-right mt-2   " >Add</a>
                </div>
               {{-- @endif --}}
            </div>

        </div>
        <!-- /Page Header -->


        <div class="row" >
            <div class="col-md-12 d-flex">

                <!-- Recent Orders -->
                <div class="card card-table flex-fill">
                    <div class="card-header">
                        <h4 class="card-title">admins List</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-center mb-0">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>City</th>
                                        <th>Phone</th>
                                        <th>Permissions</th>

                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   @isset($admins)
                                    @foreach ($admins as $admin)
                                    <tr>
                                        <td>
                                            <h2 class="table-avatar">
                                                {{-- <a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset('backend/img/doctors/doctor-thumb-01.jpg')}}" alt="User Image"></a> --}}
                                                <a href="profile.html">{{ $admin->name }}</a>
                                            </h2>
                                        </td>
                                        <td>{{ $admin->email }}</td>
                                        <td>{{ $admin->cities->name }}</td>
                                        <td>{{ $admin->phone }}</td>

                                        <td> @foreach ($admin->permissions as $permission)
                                            <span style="padding: 2px;border:1px solid #ccc">{{  $permission->name }}</span>
                                        @endforeach </td>
                                        {{-- <td>
                                            <i class="fe fe-star text-warning"></i>
                                            <i class="fe fe-star text-warning"></i>
                                            <i class="fe fe-star text-warning"></i>
                                            <i class="fe fe-star text-warning"></i>
                                            <i class="fe fe-star-o text-secondary"></i>
                                        </td> --}}
                                        {{-- @dump($admin) --}}
                                        <td >
                                            <div class="actions">
                                                <a id="{{ $admin->id }}" class="link_update bg-success-light mr-2" data-toggle="modal"  href="#edit_admins_details" >
                                                    <i class="fe fe-pencil"></i> Edit
                                                </a>
                                                <a id="{{ $admin->id }}" class="link_delete" data-toggle="modal" href="#delete_modal" data-url=""  class="btn btn-sm btn-danger" style="color: #f00">
                                                    <i class="fe fe-trash"></i> Deactivate
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
  <div class="modal fade" id="Add_admins" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add admin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @include('backend.partials.errors')

                <form method="POST" action="{{ route('admin.store') }}" enctype="multipart/form-data">
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
                        <div class="col-12 col-sm-12">
                            <label>City : </label>
                            <select id="city" name="city" class="selectpicker"  data-live-search="true"   style="width:50%;paddind:2px">
                                @foreach ($cities as $city)
                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                            @endforeach
                            </select>
                        </div>
                        <span>Permissions :</span><br><br>

                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            @php
                                 $tabs= array('admins','cooks','sections','addons','allergenes','categories','coupons','customers','cities','settings','VIP','orders','dishes');
                                 $permissions=array('read','update','delete','create')
                           @endphp
                            <li class="nav-item">
                              <a class="nav-link active" data-toggle="tab" id="cusines-tab" href="#cusines" role="tab" aria-controls="cusines"
                                aria-selected="true">Cusines</a>
                            </li>

                            @foreach ($tabs as $tab)
                            <li class="nav-item">
                                <a class="nav-link" id="{{ $tab }}.'-tab'" data-toggle="tab" href="#{{ $tab }}" role="tab" aria-controls="{{ $tab }}"
                                  aria-selected="false">{{ $tab }}</a>
                              </li>
                            @endforeach
                          </ul>
                          <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="cusines" role="tabpanel" aria-labelledby="cusines-tab">
                                <div class="custom-control custom-checkbox custom-control-inline">
                                    @foreach ($permissions as $permission)
                                    <div class="custom-control custom-checkbox custom-control-inline">
                                        <input type="checkbox" name="permission[]" {{ (is_array(old('permission')) && in_array('cusines_'.$permission , old('permission'))) ? ' checked' : '' }}  value="{{ 'cusines_'.$permission   }}" class="custom-control-input" id="{{ 'Cusine_'.$permission }}" >
                                        <label class="custom-control-label" for="{{ 'Cusine_'.$permission }}">{{ $permission }}</label>
                                    </div>
                                    @endforeach

                                </div>
                            </div>
                            @foreach ($tabs as $tab)
                            <div class="tab-pane fade" id="{{ $tab }}" role="tabpanel" aria-labelledby="{{ $tab }}.'-tab'">
                                @foreach ($permissions as $permission)
                                    <div class="custom-control custom-checkbox custom-control-inline">
                                        <input type="checkbox" name="permission[]" {{ (is_array(old('permission')) && in_array($tab.'_'.$permission, old('permission'))) ? ' checked' : '' }} value="{{$tab.'_'.$permission  }}" class="custom-control-input" id="{{ $tab.'_'.$permission }}">
                                        <label class="custom-control-label" for="{{ $tab.'_'.$permission }}">{{ $permission }}</label>
                                    </div>
                                @endforeach
                            </div>

                            @endforeach

                          </div>
                    </div>
                    <button type="submit" class="btn btn-otbokhly btn-block mt-4">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /ADD Modal -->
 <!-- Edit Details Modal -->
 <div class="modal fade" id="edit_admins_details" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit admin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @include('backend.partials.errors')

                <form id="formUpdate" method="post" action="" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <form method="POST" action="" enctype="multipart/form-data">
                        @csrf
                        <div class="row form-row">
                            <div class="col-12 col-sm-12">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control" value=" {{ $admin->name ?? old('name') }}">
                                </div>
                            </div>
                            <div class="col-12 col-sm-12">
                                <div class="form-group">
                                    <label>phone</label>
                                    <input type="text" name="phone" class="form-control" value="{{ $admin->phone ?? old('phone') }}">
                                </div>
                            </div>
                            <div class="col-12 col-sm-12">
                                <div class="form-group">
                                    <label>E-mail</label>
                                    <input type="text" name="email" class="form-control" value="{{ $admin->email ??  old('email') }}">
                                </div>
                            </div>
                            <div class="col-12 col-sm-12">
                                <div class="form-group">
                                    <label>password</label>
                                    <input type="password" name="password" class="form-control" >
                                </div>
                            </div>
                            <div class="col-12 col-sm-12">
                                <label>City : </label>
                                <select id="city" name="city" class="selectpicker"  data-live-search="true"   style="width:50%;paddind:2px">
                                    @foreach ($cities as $city)
                                    <option value="{{ $city->id }} "  {{ $admin->city_id == $city->id ? 'selected' :' '  }}>{{ $city->name }}</option>
                                @endforeach
                                </select>
                            </div>
                            <span>Permissions :</span><br><br>

                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                @php
                                     $tabs= array('admins','cooks','sections','addons','allergenes','categories','coupons','customers','cities','settings','VIP','orders','dishes');
                                     $permissions=array('read','update','delete','create')
                               @endphp
                                <li class="nav-item">
                                  <a class="nav-link active" data-toggle="tab" id="cusines-tab-update" href="#cusines-update" role="tab" aria-controls="cusines-update"
                                    aria-selected="true">Cusines</a>
                                </li>

                                @foreach ($tabs as $tab)
                                <li class="nav-item">
                                    <a class="nav-link" id="{{ $tab }}-tab-update" data-toggle="tab" href="#{{ $tab }}-update" role="tab" aria-controls="{{ $tab }}-update"
                                      aria-selected="false">{{ $tab }}</a>
                                  </li>
                                @endforeach
                              </ul>
                              <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="cusines-update" role="tabpanel" aria-labelledby="cusines-tab-update">
                                    <div class="custom-control custom-checkbox custom-control-inline">
                                        @foreach ($permissions as $permission)
                                        <div class="custom-control custom-checkbox custom-control-inline">
                                            <input type="checkbox" name="permission[]" {{$admin->hasPermission('cusines_'.$permission ) ? 'checked' :'' }}  value="{{'cusines_'.$permission  }}" class="custom-control-input" id="{{ 'cusines'.$permission }}" >
                                            <label class="custom-control-label" for="{{ 'cusines'.$permission }}">{{ $permission }}</label>
                                        </div>
                                        @endforeach

                                    </div>
                                </div>
                                @foreach ($tabs as $tab)
                                <div class="tab-pane fade" id="{{ $tab }}-update" role="tabpanel" aria-labelledby="{{ $tab }}-tab-update">
                                    @foreach ($permissions as $permission)
                                        <div class="custom-control custom-checkbox custom-control-inline">
                                            <input type="checkbox" name="permission[]" {{$admin->hasPermission($tab.'_'.$permission ) ? 'checked' :'' }} value="{{$tab.'_'.$permission  }}" class="custom-control-input" id="{{ $tab.'_'.$permission }}-update">
                                            <label class="custom-control-label" for="{{ $tab.'_'.$permission }}-update">{{ $permission }}</label>
                                        </div>
                                    @endforeach
                                </div>

                                @endforeach

                              </div>
                        </div>
                        <button type="submit" class="btn btn-otbokhly btn-block mt-4">Update Changes</button>
                    </form>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Edit Details Modal -->
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
                $('#Add_admins').modal('show');
        @endif

        $('.link_update').on('click',function(){
            var admin_id=$(this).attr('id');
            $('#formUpdate').attr('action','/{{ Config::get('app.locale') }}/dashboard/admin/'+admin_id)

        })
        $('.link_delete').on('click',function(){
            var admin_id=$(this).attr('id');

            $('#formDelete').attr('action','/{{ Config::get('app.locale') }}/dashboard/admin/'+admin_id)

        })
    </script>
@endpush
