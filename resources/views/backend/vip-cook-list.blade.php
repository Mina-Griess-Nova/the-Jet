@extends('backend.layouts.app')

@push('style')
    <style>


input[type=checkbox] + label {
  display: block;
  margin: 0.2em;
  cursor: pointer;
  padding: 0.2em;
}

input[type=checkbox] {
  display: none;
}

input[type=checkbox] + label:before {
  content: "\2714";
  border: 0.1em solid #000;
  border-radius: 0.2em;
  display: inline-table;
  width: 10px;
  height: 10px;
  padding-left: 0.2em;
  padding-bottom: 0.3em;
  margin-right: 0.2em;
  vertical-align: bottom;
  color: transparent;
  transition: .2s;
}

input[type=checkbox] + label:active:before {
  transform: scale(0);
}

input[type=checkbox]:checked + label:before {
  background-color: gold;
  border-color: gold;
  color: #fff;
}

input[type=checkbox]:disabled + label:before {
  transform: scale(1);
  border-color: #aaa;
}

input[type=checkbox]:checked:disabled + label:before {
  transform: scale(1);
  background-color: #bfb;
  border-color: #bfb;
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
                    <h3 class="page-title">List of  VIP cooks</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">vip cook</li>
                    </ul>
                </div>
               {{-- @if (!Auth::guard('cook')) --}}
                {{-- <div class="col-sm-12 col"> --}}
                    {{-- <a href="#Add_cooks" data-toggle="modal" class="btn btn-otbokhly float-right mt-2 {{ auth()->guard('cook') ? 'disabled' : '' }}" >Add</a> --}}
                    {{-- <a href="#Add_cooks" data-toggle="modal" class="btn btn-otbokhly float-right mt-2   " >Add</a>
                </div> --}}
               {{-- @endif --}}
            </div>

        </div>
        <!-- /Page Header -->


        <div class="row" >
            <div class="col-md-12 d-flex">

                <!-- Recent Orders -->
                <div class="card card-table flex-fill">
                    <div class="card-header">
                        <h4 class="card-title">cooks List</h4>

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
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   @isset($cooks)
                                   @foreach ($cooks as $cook)
                                   <tr>
                                    <td>
                                        <h2 class="table-avatar">
                                            {{-- <a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="" alt="cook Image"></a> --}}
                                            <span id="cook_id" hidden>{{ $cook->id }}</span>
                                            <input type="checkbox" class="vip_{{ $cook->id }}" id="{{ $cook->id }}" name="vip{{ $cook->id }}" value="{{ $cook->VIP =='1' ? $cook->VIP :'0'  }}"{{ $cook->VIP =='1' ? 'checked' :' '  }} onchange="vip({{ $cook->id }},this)">
                                            <label for="{{ $cook->id }}">
                                            <a href="#" style="color:{{ $cook->VIP =='1' ? 'gold' :' '  }}">{{ $cook->name }}</a>
                                        </h2>
                                    </td>
                                    <td>{{ $cook->email }}</td>
                                    <td>{{ $cook->address[0]['address'] }}</td>
                                    <td>{{ $cook->phone }}</td>
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
  <div class="modal fade" id="Add_cooks" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add cook</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @include('backend.partials.errors')

                <form method="POST" action="{{ url('dashboard/cook') }}" enctype="multipart/form-data">
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
                $('#Add_cooks').modal('show');
        @endif


        function vip(cook_id,checkbox){
            var value=document.getElementById(cook_id);
            if(value.checked == true){

                $.ajax({
                    type: 'GET',
                    url: '/{{ Config::get('app.locale') }}/dashboard/cook/vip/'+cook_id,

                    success:function(data){
                        value='1';

                    },
                    error:function(data){
                    }
                });


            }else{
                $.ajax({
                    type: 'GET',
                    url: '/{{ Config::get('app.locale') }}/dashboard/cook/reset/'+cook_id,

                    success:function(data){
                        value='0';
                        document.getElementById(cook_id).closest("tr").remove()

                    },
                    error:function(data){
                    }
                });
            }
        };

    </script>
@endpush
