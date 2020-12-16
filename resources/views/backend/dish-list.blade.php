@extends('backend.layouts.app')
<style>
.dish-type  li{
    list-style: none;
    float: left;
    margin-left:10px
}
</style>

@section('content')
 <!-- Page Wrapper -->
 <div class="page-wrapper">
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">List of Dishes</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Dish</li>
                    </ul>
                </div>
                @if (auth()->guard('admin')->user()->roles[0]->name =='super_admin')
                <div class="col-sm-12 col">
                    <a href="#Add_Dish" data-toggle="modal" class="btn btn-otbokhly float-right mt-2 disabled" >Add</a>
                </div>
                @else
                <div class="col-sm-12 col">
                    <a href="#Add_Dish" data-toggle="modal" class="btn btn-otbokhly float-right mt-2 " >Add</a>
                </div>
               @endif
            </div>

        </div>
        <!-- /Page Header -->


        <div class="row" >
            <div class="col-md-12 d-flex">

                <!-- Recent Orders -->
                <div class="card card-table flex-fill">
                    <div class="card-header">
                        <h4 class="card-title">dish List</h4>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-center mb-0">
                                <thead>
                                    <tr>
                                        <th> Name</th>
                                        <th> Images</th>
                                        <th> Section</th>
                                        <th>Cusine</th>
                                        <th>Price</th>
                                        <th>Reviews</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @if($dishes)
                                    @foreach ($dishes as $dish)
                                        <tr>
                                            <td>
                                                <h2 >{{ $dish->name }}</h2>
                                            </td>
                                            <td>

                                                @php
                                                $images= explode("__",$dish->images);
                                                @endphp
                                                @foreach ($images as $img)
                                                    <img src=" {{ asset('/backend/img/dishes/'.$img) }}" width=50 alt="">
                                                @endforeach
                                            </td>
                                            <td>{{ $dish->sections->name}}</td>

                                            <td>{{ $dish->cusines[0]->name }}</td>
                                            <td>{{ $dish->price }}</td>
                                            <td>
                                                <i class="fe fe-star-o text-secondary"></i>
                                                <i class="fe fe-star-o text-secondary"></i>
                                                <i class="fe fe-star-o text-secondary"></i>
                                                <i class="fe fe-star-o text-secondary"></i>
                                                <i class="fe fe-star-o text-secondary"></i>
                                            </td>
                                            <td >
                                                @if (auth()->guard('admin')->user()->hasRole('super_admin'))
                                                    <div class="actions">
                                                        <a class="link_update bg-success-light mr-2 disabled" data-toggle="modal"  href="#edit_specialities_details" >
                                                            <i class="fe fe-pencil"></i> Edit
                                                        </a>
                                                        <a class="link_delete disabled" data-toggle="modal" href="#delete_modal" data-url=""  class="btn btn-sm btn-danger" style="color: #f00" >
                                                            <i class="fe fe-trash"></i> Delete
                                                        </a>
                                                    </div>
                                                @else
                                                <div class="actions">
                                                    <a class="link_update bg-success-light mr-2" data-toggle="modal"  href="#edit_specialities_details" >
                                                        <i class="fe fe-pencil"></i> Edit
                                                    </a>
                                                    <a class="link_delete" data-toggle="modal" href="#delete_modal" data-url=""  class="btn btn-sm btn-danger" style="color: #f00">
                                                        <i class="fe fe-trash"></i> Delete
                                                    </a>
                                                </div>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                  @endif

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
        <div class="modal fade" id="edit_specialities_details" aria-hidden="true" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document" >
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Specialities</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="formUpdate" method="post" action="" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="row form-row">
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Sections</label>
                                        <input id="img_name" type="text" name="name" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Image</label>
                                        <input  type="file" name="src_image" class="form-control" onchange="img_src.src=window.URL.createObjectURL(this.files[0])">
                                        <img id="img_src" src="" alt="" width="63" height="63">
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
  <div class="modal fade" id="Add_Dish" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Dish</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @include('backend.partials.errors')

                <form method="POST" action="{{ url('dashboard/dish') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row form-row">
                        <div class="col-12 col-sm-12">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <div  class="dropzone dz-clickable" >
                                    <div class="dz-default dz-message">
                                    <label>Dish Images : </label>

                                        <input class="box__file" type="file" name="files[]" id="file" onchange="showImage(this)"   data-multiple-caption="{count} files selected"  multiple  hidden/>
                                        <label for="file"><strong>Choose a file</strong></label>
                                    </div>
                                </div>
                                <div class="upload-wrap">


                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-12">
                            <div class="form-group row">
                                <div class="col-9 col-sm-9">
                                <label>Cusines : </label>

                                    <select name="cusine[]" class="selectpicker" multiple data-live-search="true" style="width:50%;paddind:2px">
                                        @foreach ($cusines as $cusine)
                                            <option value="{{ $cusine->id }}">{{ $cusine->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12">
                            <div class="form-group row">
                                <div class="col-9 col-sm-9">
                                <label>Categories : </label>

                                    <select id="category" name="category" class="selectpicker"  data-live-search="true" style="width:50%;paddind:2px">
                                        <option value="">select</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12">
                            <div class="form-group row">
                                <div class="col-9 col-sm-9">
                                <label>Addons : </label>
                                    <select id="addons" name="addons[]" class="selectpicker" multiple data-live-search="true"   style="width:50%;paddind:2px">

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12">
                            <div class="form-group row">
                                <div class="col-9 col-sm-9">
                                <label>Allergens : </label>
                                    <select id="allergens" name="allergens[]" class="selectpicker" multiple data-live-search="true"   style="width:50%;paddind:2px">
                                        @foreach ($allergens as $allergen)
                                        <option value="{{ $allergen->id }}">{{ $allergen->name }}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12">
                            <div class="form-group">
                                <label>price : </label>
                                <input type="text" name="price" class="form-control" placeholder=" 10  " value="{{ old('price') }}" style="width: 20%;display:inline"> <span> $</span>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12">
                            <div class="form-group">
                                <label>portions available : </label>
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                      <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                                        aria-selected="true">Large</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
                                        aria-selected="false">Medium</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact"
                                        aria-selected="false">Small</a>
                                    </li>
                                  </ul>
                                  <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <input type="number" name="portions_available[]" class="form-control" placeholder=" 5 " value="{{ old('portions_lg_available') }}" style="width: 20%;display:inline"> <span> persons</span>
                                    </div>
                                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <input type="number" name="portions_available[]" class="form-control" placeholder=" 3 " value="{{ old('portions_md_available') }}" style="width: 20%;display:inline"> <span> persons</span>
                                    </div>
                                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                        <input type="number" name="portions_available[]" class="form-control" placeholder=" 2 " value="{{ old('portions_sm_available') }}" style="width: 20%;display:inline"> <span> persons</span>
                                    </div>
                                  </div>


                            </div>
                        </div>
                        <div class="col-12 col-sm-12">
                            <label>Section : </label>

                            <ul class="dish-type">
                               @foreach ($sections as $section)
                               <li>
                                <input type="radio"  name="section" value="{{ $section->id }}">
                                <label for="f-option">{{ $section->name }}</label>
                                <div class="check"></div>
                              </li>
                               @endforeach
                            </ul>
                        </div>
                        <div class="col-12 col-sm-12">
                            <label>availability : </label>

                            <ul class="dish-type">
                               <li>
                                <input type="radio" id="f-option" name="dish_available" value="1" checked>
                                <label for="f-option">availabe</label>
                                <div class="check"></div>
                                <input name="available_count" type="number" style="width: 20%"> dish
                              </li>
                              <li>
                                <input type="radio" id="" name="dish_available" value="0">
                                <label for="f-option">not available</label>
                                <div class="check"></div>
                              </li>
                            </ul>
                        </div>
                        <div class="col-12 col-sm-12">
                            <div class="form-group">
                                <label>Ingredients</label>
                                <input type="text" name="ingredients" class="form-control" value="{{ old('ingredients') }}">
                            </div>
                        </div>
                        <div class="col-12 col-sm-12">
                            <div class="form-group">
                                <label>Descriptions</label>
                               <textarea name="info" style="width: 90%"  rows="3"></textarea>
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
                    <div class="form-contendropdown bootstrap-selectlete">
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
                $('#Add_Dish').modal('show');
        @endif
        $('select').selectpicker();


function removeDiv(elem){
    $(elem).parent('div').remove();
}

function showImage(file){


for (var i = 0; i < file.files['length']; i++) {

    var img='<div class="upload-image float-left" id="upload-image" style="display:inline-block">'+
                "<img id='img_src' width=50 src="+"'" +window.URL.createObjectURL(file.files[i])+"'"+">"+
                '<a onClick="removeDiv(this)" href="javascript:void(0);" class="btn  btn-danger btn-sm" style="padding:3px"><i class="far fa-trash-alt"></i></a>'+
            '</div>';

    $(".upload-wrap").append(img);

    $('.upload-image').css('display','block');
};
};



    $('#category').change(function(){

    var category_id = document.getElementById('category').value;
    $('#addons').html('');

    $.ajax({
    type: 'GET',
    url: '/dashboard/addons/'+ category_id,

    success: function(data) {

             for (var i = 0; i < data.success.length; i++) {


               $("#addons").append('<option value="' + data.success[i].id + '" selected="selected">' + data.success[i].name + '</option>');;
             }
             $('#addons').selectpicker('refresh');


    }
    });

    });


    </script>
@endpush


