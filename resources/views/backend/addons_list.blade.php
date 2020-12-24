@extends('backend.layouts.app')


@addon('content')
 <!-- Page Wrapper -->
 <div class="page-wrapper">
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">List of addons</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">addon</li>
                    </ul>
                </div>
               {{-- @if (!Auth::guard('cook')) --}}
                <div class="col-sm-12 col">
                    <a href="#Add_addon" data-toggle="modal" class="btn btn-otbokhly float-right mt-2 " >Add</a>
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
                        <h4 class="card-title">addon List</h4>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-center mb-0">
                                <thead>
                                    <tr>
                                        <th> #</th>
                                        <th> Name</th>
                                        <th> Category</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @isset ($addons)
                                        @foreach ($addons as $index=>$addon)
                                        <tr>
                                            <td>
                                                {{ $index }}
                                            </td>

                                            <td>{{ $addon->name }}</td>
                                            <td>
                                                @foreach ($addon->categories as $category)
                                                <span style="padding: 2px;border:1px solid #ccc">{{ $category->name }}</span>
                                                @endforeach
                                            </td>

                                            <td >
                                                <div class="actions">
                                                    <a id="{{ $addon->id }}" class="link_update bg-success-light mr-2" data-toggle="modal"  href="#edit_addons_details" >
                                                        <i class="fe fe-pencil"></i> Edit
                                                    </a>
                                                    <a id="{{ $addon->id }}" class="link_delete" data-toggle="modal" href="#delete_modal" data-url=""  class="btn btn-sm btn-danger" style="color: #f00">
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
        <!-- Edit Details Modal -->
        <div class="modal fade" id="edit_addons_details" aria-hidden="true" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document" >
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit addons</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="formUpdate" method="post" action="" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="row form-row">
                                @foreach (config('translatable.locales') as $locale)
                                <div class="col-12 col-sm-12">
                                    <div class="form-group">
                                        <label>@lang('site.'.$locale.'.name')</label>
                                        @isset($addon)
                                        <input type="text" name="{{ $locale }}[name]" class="form-control" value="{{ $addon->translate($locale)->name }}">
                                        @endisset
                                    </div>
                                </div>
                                @endforeach

                                <div class="col-12 col-sm-12">
                                    <div class="form-group row">
                                        <div class="col-9 col-sm-9">
                                        <label>Categories : </label>

                                            <select id="category" name="categories[]" class="selectpicker" multiple data-live-search="true" style="width:50%;paddind:2px">
                                               @isset($categories)
                                               @foreach ($categories as $category)
                                               @isset($addon)
                                                 <option {{ (in_array($category->id, $addon->categories->pluck('id')->toArray()))? 'selected' :' ' }} value="{{ $category->id }}">{{ $category->name }}</option>
                                               @endisset
                                               @endforeach
                                               @endisset
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Edit Details Modal -->
  <!-- Add Modal -->
  <div class="modal fade" id="Add_addon" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add addon</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @include('backend.partials.errors')

                <form method="POST" action="{{ route('addons.store') }}">
                    @csrf
                    <div class="row form-row">

                        @foreach (config('translatable.locales') as $locale)
                        <div class="col-12 col-sm-12">
                            <div class="form-group">
                                <label>@lang('site.'.$locale.'.name')</label>
                                <input type="text" name="{{ $locale }}[name]" class="form-control" value="{{ old($locale.'.name') }}">
                            </div>
                        </div>
                        @endforeach
                        <div class="col-12 col-sm-12">
                            <div class="form-group row">
                                <div class="col-9 col-sm-9">
                                <label>Categories : </label>

                                    <select id="category" name="categories[]" class="selectpicker" multiple data-live-search="true" style="width:50%;paddind:2px">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-otbokhly btn-block">Save</button>
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




@push('scripts')
    <script>
        @if (count($errors) > 0)
                $('#Add_addon').modal('show');
        @endif

        $('.link_update').on('click',function(){
            var addon_id=$(this).attr('id');

            $('#formUpdate').attr('action','/{{ Config::get('app.locale') }}/dashboard/addons/'+addon_id)

        })
        $('.link_delete').on('click',function(){
            var addon_id=$(this).attr('id');

            $('#formDelete').attr('action','/{{ Config::get('app.locale') }}/dashboard/addons/'+addon_id)

        })

    </script>
@endpush
