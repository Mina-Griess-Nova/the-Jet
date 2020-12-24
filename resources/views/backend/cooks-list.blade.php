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
                    <h3 class="page-title">List of Cooks</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Cook</li>
                    </ul>
                </div>
               {{-- @if (!Auth::guard('cook')) --}}
                <div class="col-sm-12 col">
                    {{-- <a href="#Add_Cooks" data-toggle="modal" class="btn btn-otbokhly float-right mt-2 {{ auth()->guard('cook') ? 'disabled' : '' }}" >Add</a> --}}
                    <a href="#Add_Cooks" data-toggle="modal" class="btn btn-otbokhly float-right mt-2   " >Add</a>
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
                                        <th>Contract</th>
                                        <th>City</th>
                                        <th>Commission</th>
                                        <th>Commission Type</th>
                                        {{-- <th>Reviews</th> --}}
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @isset($cooks)
                                        @foreach ($cooks as $cook)
                                        <tr>
                                            <td>
                                                <h2 class="table-avatar">


                                                    <input type="checkbox" class="vip_{{ $cook->id }}" id="{{ $cook->id }}" name="vip{{ $cook->id }}" value="{{ $cook->VIP =='1' ? $cook->VIP :'0'  }}"{{ $cook->VIP =='1' ? 'checked' :' '  }} onchange="vip({{ $cook->id }},this)">
                                                    <label for="{{ $cook->id }}">
                                                    <a href="#" style="color:{{ $cook->VIP =='1' ? 'gold' :' '  }}">{{ $cook->name }}</a>

                                                </h2>
                                            </td>
                                            <td>{{ $cook->email }}</td>
                                            <td>{{  $cook->phone  }}</td>
                                            <td>{{  $cook->contract  }}</td>
                                            <td>{{  $cook->cities->name }}</td>
                                            <td>{{  $cook->commission  }}</td>
                                            <td>{{  $cook->commission_type  }}</td>
                                            {{-- <td>
                                                <i class="fe fe-star-o text-secondary"></i>
                                                <i class="fe fe-star-o text-secondary"></i>
                                                <i class="fe fe-star-o text-secondary"></i>
                                                <i class="fe fe-star-o text-secondary"></i>
                                                <i class="fe fe-star-o text-secondary"></i>
                                            </td> --}}
                                            <td >
                                                <div class="actions">
                                                    <a id="{{ $cook->id }}" class="link_delete" data-toggle="modal" href="#delete_modal" data-url=""  class="btn btn-sm btn-danger" style="color: #f00">
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
  <div class="modal fade" id="Add_Cooks" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Cook</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @include('backend.partials.errors')

                <form method="POST" action="{{ route('cook.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row form-row">
                        @foreach (config('translatable.locales') as $locale)
                        <div class="col-12 col-sm-12">
                            <div class="form-group">
                                <label>{{ trans('site.'.$locale.'.name') }}</label>
                                <input type="text" name="{{ $locale }}[name]" class="form-control" value="{{ old($locale.'.name') }}">
                            </div>
                        </div>
                        @endforeach
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
                            <select id="cooks" name="city" class="selectpicker"  data-live-search="true"   style="width:50%;paddind:2px">
                                @foreach ($cities as $city)
                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="col-12 col-sm-12 mt-3">
                            <div class="form-group">
                                <label>Contract Number</label>
                                <input type="text" name="contract" class="form-control" >
                            </div>
                        </div>
                        <div class="col-12 col-sm-12">
                            <div class="form-group">
                                <label>Commission</label>
                                <input type="number" name="commission" class="" style="width: 50%;dislay:inline !important">
                                <select class="form-control" name="commission_type"  id="commission_type" title="EGP" placeholder="EGP"  data-live-search="true"   style="width:20%!important;display: inline !important;paddind:2px" >
                                    <option value="EGP">EGP </option>
                                    <option value="%">% </option>

                                </select>
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
                $('#Add_Cooks').modal('show');
        @endif

        $('.link_delete').on('click',function(){
            var cook_id=$(this).attr('id');

            $('#formDelete').attr('action','/{{ Config::get('app.locale') }}/dashboard/cook/'+cook_id)

        })


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

                    },
                    error:function(data){
                    }
                });
            }
        };
    </script>
@endpush
