@extends('backend.layouts.app')


@section('content')
 <!-- Page Wrapper -->
 <div class="page-wrapper">
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">List of sections</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">section</li>
                    </ul>
                </div>
               {{-- @if (!Auth::guard('cook')) --}}
                <div class="col-sm-12 col">
                    <a href="#Add_section" data-toggle="modal" class="btn btn-otbokhly float-right mt-2 {{ auth()->guard('admin') ? '' : ' ' }}" >Add</a>
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
                        <h4 class="card-title">section List</h4>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-center mb-0">
                                <thead>
                                    <tr>
                                        <th> #</th>
                                        <th> Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @isset ($sections)
                                        @foreach ($sections as $index=>$section)
                                        <tr>
                                            <td>
                                                {{ $index }}
                                            </td>

                                            <td>{{ $section->name }}</td>

                                            <td >
                                                <div class="actions">
                                                    <a id="{{ $section->id }}" class="link_update bg-success-light mr-2" data-toggle="modal"  href="#edit_sections_details" >
                                                        <i class="fe fe-pencil"></i> Edit
                                                    </a>
                                                    <a id="{{ $section->id }}" class="link_delete" data-toggle="modal" href="#delete_modal" data-url=""  class="btn btn-sm btn-danger" style="color: #f00">
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
        <div class="modal fade" id="edit_sections_details" aria-hidden="true" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document" >
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit sections</h5>
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
                                        @isset($section)
                                        <input type="text" name="{{ $locale }}['name']" class="form-control" value="{{ $section->translate($locale)->name }}">
                                        @endisset
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Edit Details Modal -->
  <!-- Add Modal -->
  <div class="modal fade" id="Add_section" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add section</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @include('backend.partials.errors')

                <form method="POST" action="{{ route('section.store') }}">
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


@endsection


@push('scripts')
    <script>
        @if (count($errors) > 0)
                $('#Add_section').modal('show');
        @endif

        $('.link_update').on('click',function(){
            var section_id=$(this).attr('id');

            $('#formUpdate').attr('action','/{{ Config::get('app.locale') }}/dashboard/section/'+section_id)

        })
        $('.link_delete').on('click',function(){
            var section_id=$(this).attr('id');

            $('#formDelete').attr('action','/{{ Config::get('app.locale') }}/dashboard/section/'+section_id)

        })
    </script>
@endpush
